<?php

/*
Práctica parcial Bacchetta Tomás


Se debe realizar una aplicación para dar de ingreso con imagen del item.
Se deben respetar los nombres de los archivos y de las clases.
Se debe crear una clase en PHP por cada entidad y los archivos PHP solo deben llamar a métodos de las clases.

1era parte

1-
A- (1 pt.) index.php:Recibe todas las peticiones que realiza el postman, y administra a que archivo se debe incluir.
B- (1 pt.) PizzaCarga.php: (por GET)se ingresa Sabor, precio, Tipo (“molde” o “piedra”), cantidad( de unidades). Se
guardan los datos en en el archivo de texto Pizza.json, tomando un id autoincremental como
identificador(emulado) .Sí el sabor y tipo ya existen , se actualiza el precio y se suma al stock existente.
2-
(1pt.) PizzaConsultar.php: (por POST)Se ingresa Sabor,Tipo, si coincide con algún registro del archivo Pizza.json,
retornar “Si Hay”. De lo contrario informar si no existe el tipo o el sabor.
3-
a- (1 pts.) AltaVenta.php: (por POST)se recibe el email del usuario y el sabor,tipo y cantidad ,si el ítem existe en
Pizza.json, y hay stock guardar en la base de datos( con la fecha, número de pedido y id autoincremental ) y se
debe descontar la cantidad vendida del stock .
b- (1 pt) completar el alta con imagen de la venta , guardando la imagen con el tipo+sabor+mail(solo usuario hasta
el @) y fecha de la venta en la carpeta /ImagenesDeLaVenta.




*/

use Venta as GlobalVenta;

require_once("pizza.php");
require_once("VentaDatosSql.php");

class Venta{

    private $_numPedido;
    private $_mail;
    private $_idPizza;
    private $_sabor;
    private $_tipo;
    private $_cantidad;
    private $_fecha;
  
   
    
   
    public function __construct($numPedido = "", $mail = "", $idPizza = "", $sabor = "", $tipo = "", $cantidad = "", $fecha = "")
    {
        $this->_numPedido = $numPedido;
        $this->_mail = $mail;
        $this->_idPizza = $idPizza;
        $this->_sabor = $sabor;
        $this->_tipo = $tipo;
        $this->_cantidad = $cantidad;
        $this->_fecha = $fecha;
    }


    public function RealizarVenta($rutaFoto){
        try
        {

            $pizzaAComprar = new Pizza("", $this->_sabor, "", $this->_tipo, 0);
            $pizzas = Pizza::ObtenerPizzas("Pizza.json");
            $pizzaExistente = $pizzaAComprar->RetornarPizzaIgual($pizzas);
            
            if (isset($pizzaExistente) && $pizzaExistente->SustraerCantidad($pizzaAComprar->get_cantidad()))
            {
                $this->_idPizza = $pizzaExistente->get_id();
                $numPedido = VentaDatosSql::InsertarVentaEnTabla($this);
                Pizza::GuardarPizzas($pizzas, "Pizza.json");
                if (!file_exists('ImagenesDeLaVenta/')) {
                    mkdir('ImagenesDeLaVenta/', 0777, true);
                }
                $destino = "ImagenesDeLaVenta/" . $numPedido . '-' . $this->_tipo . '-' . $this->_sabor . '-' .explode('@', $this->_mail)[0] . "@" . $this->_fecha . ".jpg";
                move_uploaded_file($rutaFoto, $destino);
                return true;
            } else 
            {
                return false;
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
            return false;
        }
        
        
    }

    public function ModificarVenta(){
        
        $ventaEnBd = VentaDatosSql::ObtenerUnaVentaPorNumPedido($this->_numPedido);
        $pizzaRequerida = new Pizza("", $this->_sabor, "", $this->_tipo, 0);
        if ($ventaEnBd && $pizzaRequerida->RetornarPizzaIgual(Pizza::ObtenerPizzas("Pizza.json"))!= null){//si existe la venta y la pizza
            $this->_numPedido = $ventaEnBd->get_numPedido();
            VentaDatosSql::ModificarVentaEnTabla($this);
            return true;
        }
        
        
        return false;
        
    }

    public static function BorrarVenta($numPedido){
        
        $ventaABorrar = VentaDatosSql::ObtenerUnaVentaPorNumPedido($numPedido);
        if ($ventaABorrar){
            VentaDatosSql::BorrarVentaEnTablaPorNumPedido($numPedido);
            if (!file_exists('BACKUPVENTAS/')) {
                mkdir('BACKUPVENTAS/', 0777, true);
            }
            $destino = $numPedido . '-' . $ventaABorrar->get_tipo() . '-' . $ventaABorrar->get_sabor() . '-' .explode('@', $ventaABorrar->get_mail())[0] . "@" . $ventaABorrar->get_fecha() . ".jpg";
            rename("ImagenesDeLaVenta/" . $destino, "BACKUPVENTAS/" . $destino);
            return true;
        }
        
        return false;

    }

    public static function DevolverListaHTMLVentas($ventas)
    {
        
        if (count($ventas) > 0){
            $strSalida ="<ul>";
            $strSalida .= "<li>";
            foreach ($ventas[0] as $key=>$value){
                $strSalida .= $key . ", ";
            }
            $strSalida .= "</li>";
            foreach ($ventas as $element){
                $strSalida .= "<li>";
                foreach ($element as $key=>$value){
                    
                    $strSalida .= $value . ", ";
                }
                $strSalida .= "</li>";
            }
            $strSalida .= "</ul>";
            return $strSalida;
        }
        return "";
        
    }


    public static function MostrarCantidadPizzasVendidas(){
        return "La cantidad de pizzas vendidas es de: " . VentaDatosSql::ObtenerTotalPizzasVendidas();
    }


    public static function MostrarVentasEntreFechasOrdenadasPorSabor($fechaDesde, $fechaHasta){
        return Venta::DevolverListaHTMLVentas(VentaDatosSql::ObtenerVentasDeLaTablaEntreDosFechasOrdenadasPorSabor($fechaDesde, $fechaHasta));
    }


    public static function MostrarVentasDeUnUsuario($usuario){
        return Venta::DevolverListaHTMLVentas(VentaDatosSql::ObtenerVentasDeLaTablaPorUsuario($usuario));
    }

    public static function MostrarVentasDeUnSabor($sabor){
        return Venta::DevolverListaHTMLVentas(VentaDatosSql::ObtenerVentasDeLaTablaPorSabor($sabor));
    }



    


  

    /**
     * Get the value of _fecha
     */ 
    public function get_fecha()
    {
        return $this->_fecha;
    }

    /**
     * Set the value of _fecha
     *
     * @return  self
     */ 
    public function set_fecha($_fecha)
    {
        $this->_fecha = $_fecha;

        return $this;
    }

    /**
     * Get the value of _cantidad
     */ 
    public function get_cantidad()
    {
        return $this->_cantidad;
    }

    /**
     * Set the value of _cantidad
     *
     * @return  self
     */ 
    public function set_cantidad($_cantidad)
    {
        $this->_cantidad = $_cantidad;

        return $this;
    }

    /**
     * Get the value of _tipo
     */ 
    public function get_tipo()
    {
        return $this->_tipo;
    }

    /**
     * Set the value of _tipo
     *
     * @return  self
     */ 
    public function set_tipo($_tipo)
    {
        $this->_tipo = $_tipo;

        return $this;
    }

    /**
     * Get the value of _sabor
     */ 
    public function get_sabor()
    {
        return $this->_sabor;
    }

    /**
     * Set the value of _sabor
     *
     * @return  self
     */ 
    public function set_sabor($_sabor)
    {
        $this->_sabor = $_sabor;

        return $this;
    }

    

    /**
     * Get the value of _idPizza
     */ 
    public function get_idPizza()
    {
        return $this->_idPizza;
    }

    /**
     * Set the value of _idPizza
     *
     * @return  self
     */ 
    public function set_idPizza($_idPizza)
    {
        $this->_idPizza = $_idPizza;

        return $this;
    }

    /**
     * Get the value of _mail
     */ 
    public function get_mail()
    {
        return $this->_mail;
    }

    /**
     * Set the value of _mail
     *
     * @return  self
     */ 
    public function set_mail($_mail)
    {
        $this->_mail = $_mail;

        return $this;
    }

    /**
     * Get the value of _numPedido
     */ 
    public function get_numPedido()
    {
        return $this->_numPedido;
    }

    /**
     * Set the value of _numPedido
     *
     * @return  self
     */ 
    public function set_numPedido($_numPedido)
    {
        $this->_numPedido = $_numPedido;

        return $this;
    }
}



?>