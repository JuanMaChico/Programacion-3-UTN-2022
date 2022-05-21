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
        $consulta = $objetoAccesoDato->RetornarConsulta("INSERT into ventas (email, sabor, tipo, stock, fecha)
		                                                            values(:mail, :sabor, :tipo, :stock, :fecha)");
        $consulta->bindValue(':mail',  $mail, PDO::PARAM_STR);
        $consulta->bindValue(':sabor', $sabor, PDO::PARAM_STR);
        $consulta->bindValue(':tipo',  $tipo, PDO::PARAM_STR);
        $consulta->bindValue(':stock', $stock, PDO::PARAM_INT);
        $consulta->bindValue(':fecha', date("Y-m-d"), PDO::PARAM_STR);

        $consulta->execute();
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

    /**
     * @param $fecha Opcional, si no se pasa se toma la fecha actual -1.
     */
    public static function ConsultaVentasSql($fecha = "")
    {
        $objetoAccesoDato = AccesoDatosSql::ObtenerObjectoAccesoDatos();
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM ventas WHERE fecha = :fecha");
        $fecha = ($fecha == "") ? date("Y-m-d", strtotime("-1 day")) : $fecha;
        $consulta->bindValue(':fecha',  $fecha, PDO::PARAM_STR);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $usuario,
     * @return array con los datos de la venta a un usuario.
     */
    public static function ConsultaVentasPorUsuarioSql($usuario)
    {
        $objetoAccesoDato = AccesoDatosSql::ObtenerObjectoAccesoDatos();
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM ventas WHERE email = :email");
        $consulta->bindValue(':email',  $usuario, PDO::PARAM_STR);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $desde, fecha de inicio de la consulta.
     * @param $hasta, fecha de fin de la consulta.
     * @return array con los datos de la venta entre una fecha y otra.
     */
    public static function ConsultaVentasDesdeHastaSql($desde, $hasta)
    {
        //SELECT * FROM ventas WHERE fecha >= '2022-03-12' and fecha < '2022-07-12' 
        //ORDER BY email ASC (Modelo de consulta)
        $objetoAccesoDato = AccesoDatosSql::ObtenerObjectoAccesoDatos();
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM ventas WHERE fecha >= :desde and fecha < :hasta ORDER BY email ASC");
        $consulta->bindValue(':desde',  $desde, PDO::PARAM_STR);
        $consulta->bindValue(':hasta',  $hasta, PDO::PARAM_STR);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $desde, fecha de inicio de la consulta.
     * @param $hasta, fecha de fin de la consulta.
     * @return array con los datos de la venta entre una fecha y otra.
     */
    public static function ConsultaVentasPorSaborSQL($sabor)
    {
        //SELECT * FROM ventas WHERE fecha >= '2022-03-12' and fecha < '2022-07-12' 
        //ORDER BY email ASC (Modelo de consulta)
        $objetoAccesoDato = AccesoDatosSql::ObtenerObjectoAccesoDatos();
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM ventas WHERE sabor = :sabor");
        $consulta->bindValue(':sabor',  $sabor, PDO::PARAM_STR);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function ModificarVentaSql($id, $email, $sabor, $tipo, $cantidad)
    {
        $objetoAccesoDato = AccesoDatosSql::ObtenerObjectoAccesoDatos();
        $consulta = $objetoAccesoDato->RetornarConsulta("UPDATE ventas SET email = :email ,sabor = :sabor ,tipo = :tipo ,stock = :stock WHERE id = :id");
        $consulta->bindValue(':id',     $id, PDO::PARAM_INT);
        $consulta->bindValue(':email',  $email, PDO::PARAM_STR);
        $consulta->bindValue(':sabor',  $sabor, PDO::PARAM_STR);
        $consulta->bindValue(':stock',  $cantidad, PDO::PARAM_STR);
        $consulta->bindValue(':tipo',   $tipo, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
}
