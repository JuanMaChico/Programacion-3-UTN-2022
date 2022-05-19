<?php

//Librerias Necesarias
include_once "JsonController.php";
include_once "sqlController.php";


class Heladeria implements \JsonSerializable
{

    public static $id_AutoIncrement = 0;

    public $_id;
    public $_sabor;
    public $_precio;
    public $_tipo;
    public $_stock;

    public function __construct($sabor, $precio, $tipo, $stock)
    {
        $this->_id = heladeria::createIdAutoIncrement();
        $this->_sabor = $sabor;
        $this->_precio = $precio;
        $this->_tipo = $tipo;
        $this->_stock = $stock;
    }

    public function getSabor()
    {
        return $this->_sabor;
    }

    public function getPrecio()
    {
        return $this->_precio;
    }

    public function getTipo()
    {
        return $this->_tipo;
    }

    public function getStock()
    {
        return $this->_stock;
    }

    public function __toString()
    {
        return "<br>" . "Id: " . $this->_id . " Sabor: " . $this->_sabor . " Precio: " . $this->_precio . " Tipo: " . $this->_tipo . " Stock: " . $this->_stock;
    }

    public static function createIdAutoIncrement()
    {
        $id_aux = Heladeria::$id_AutoIncrement + 1;
        Heladeria::$id_AutoIncrement = $id_aux;
        return $id_aux;
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }

    public static function altaHeladeria($heladeria)
    {
        if (file_exists("Heladeria.json")) {
            if (Heladeria::HeladeriaExist($heladeria)) {
                JsonController::GuardarArchivo("Heladeria.json",  $heladeria->actualizarHeladeria());
            } else {
                $arrayDeHelados = JsonController::LeerArchivo("Heladeria.json");
                array_push($arrayDeHelados, $heladeria);
                JsonController::GuardarArchivo("Heladeria.json", $arrayDeHelados);
                if (!file_exists("ImagenesDeHelados")) {
                    mkdir('ImagenesDeHelados/', 0777, true);
                }
                $imagen = $_FILES["archivo"];
                echo "<br>";
                $destino = "ImagenesDeHelados/" . $heladeria->getSabor() . "_" . $heladeria->getTipo() . ".jpg";
                move_uploaded_file($imagen["tmp_name"], $destino);
            }
        } else {
            echo "No existe el archivo";
            JsonController::CrearArchivo("Heladeria.json", $heladeria);
            if (!file_exists("ImagenesDeHelados")) {
                mkdir('ImagenesDeHelados/', 0777, true);
            }
            $imagen = $_FILES["archivo"];
            echo "<br>";
            $destino = "ImagenesDeHelados/" . $heladeria->getSabor() . "_" . $heladeria->getTipo() . ".jpg";
            move_uploaded_file($imagen["tmp_name"], $destino);
        }
    }

    public function actualizarHeladeria()
    {
        $arrayHeladerias = JsonController::LeerArchivo("Heladeria.json");
        foreach ($arrayHeladerias as $h) {
            if ($h->_sabor == $this->_sabor && $h->_tipo == $this->_tipo) {
                $h->_precio = $this->_precio;
                $h->_stock += $this->_stock;
            }
        }
        return $arrayHeladerias;
    }

    /**
     * Si existe retorna True, sino retorna False.
     */
    public static function HeladeriaExist($heladeria)
    {
        $arrayHeladerias = JsonController::LeerArchivo("Heladeria.json");
        if (!empty($arrayHeladerias)) {
            foreach ($arrayHeladerias as $h) {
                if ($h->_sabor == $heladeria->_sabor && $h->_tipo == $heladeria->_tipo) {
                    return true;
                }
            }
        }
        return false;
    }

    public static function ConsultarHelado($sabor, $tipo)
    {
        $arrayHeladerias = JsonController::LeerArchivo("Heladeria.json");
        if (!empty($arrayHeladerias)) {
            foreach ($arrayHeladerias as $h) {
                if ($h->_sabor == $sabor && $h->_tipo == $tipo) {
                    return "El helado sabor " . $sabor . " de " . $tipo . " existe";
                }
            }
        }
        return "El helado sabor " . $sabor . "de" . $tipo . " no existe";
    }

    public static function VenderHelado($mail, $sabor, $tipo, $stock)
    {
        echo "<br>Vender Helado<br>";
        //ver si hay stock para realizar la venta.
        $arrayHeladerias = JsonController::LeerArchivo("Heladeria.json");
        if (!empty($arrayHeladerias)) {
            foreach ($arrayHeladerias as $h) {
                if ($h->_sabor == $sabor && $h->_tipo == $tipo) {
                    echo "<br>Llegamos aca<br>";
                    if ($h->getStock() >= $stock) {
                        echo "se puede vender";
                        $h->_stock -= $stock;
                        $formatMail = explode('@', $mail);
                        $fechaHoy = date("Y-m-d");
                        Heladeria::VentaSql($formatMail[0], $sabor, $tipo, $stock);
                        if (!file_exists("ImagenesDeVentas")) {
                            mkdir('ImagenesDeVentas/', 0777, true);
                        }
                        $imagen = $_FILES["archivo"];
                        echo "<br>";
                        $destino = "ImagenesDeVentas/" . $sabor . "_" . $tipo . " " . $formatMail[0] . $fechaHoy . ".png";
                        echo move_uploaded_file($imagen["tmp_name"], $destino);
                    } else {
                        echo "no hay stock Suficiente";
                    }
                }
            }
            JsonController::GuardarArchivo("Heladeria.json", $arrayHeladerias);
        }
    }

    public static function VentaSql($mail, $sabor, $tipo, $stock)
    {
        $objetoAccesoDato = AccesoDatosSql::ObtenerObjectoAccesoDatos();
        $consulta = $objetoAccesoDato->RetornarConsulta("INSERT into ventas (email, sabor, tipo, stock)
		                                                            values(:mail, :sabor, :tipo, :stock)");

        $consulta->bindValue(':mail', $mail, PDO::PARAM_STR);
        $consulta->bindValue(':sabor', $sabor, PDO::PARAM_STR);
        $consulta->bindValue(':tipo', $tipo, PDO::PARAM_STR);
        $consulta->bindValue(':stock', $stock, PDO::PARAM_INT);

        $consulta->execute();
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }
}
