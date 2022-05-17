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





*/

require_once("PizzaDatosJSON.php");

class Pizza implements \JsonSerializable{

    private $_id;
    private $_sabor;
    private $_precio;
    private $_tipo;
    private $_cantidad;
    

   
    public function __construct($id = "", $sabor = "", $precio = "", $tipo = "", $cantidad = 0)
    {
        $this->_id = $id;
        $this->_sabor = $sabor;
        $this->_precio = $precio;
        $this->_tipo = $tipo;
        $this->_cantidad = $cantidad;
        


    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }

    public static function Equals($p1, $p2){
        if ($p1->Get_Id() == $p2->Get_Id()){
            return 1;
        }
        return 0;
    }

    public function AgregarCantidad($cantidadAgregada){
        $this->_cantidad += $cantidadAgregada;
    }

    public function SustraerCantidad($cantidadExtraida){
        if ($this->_cantidad >= $cantidadExtraida){
            $this->_cantidad -= $cantidadExtraida;
            return true;
        } else {
            return false;
        }
        

    }

    public static function BuscarPizzaPorId($pizzas, $id){
        foreach ($pizzas as $ePizza){
            if ($ePizza->get_id() == $id){
                return $ePizza;
            }
        }
        return null;
    }

 

    //ALTA

    //Sí el sabor y tipo ya existen , se actualiza el precio y se suma al stock existente.
    
    public function DarDeAlta($nombreArchivo, $rutaFoto){
        $retorno = 1;//dada de alta
        try
        {
            $pizzas = Pizza::ObtenerPizzas($nombreArchivo);
            $pizzaExistente = $this->RetornarPizzaIgual($pizzas);
        if (isset($pizzaExistente)){//ya existe la pizza
            $pizzaExistente->set_precio($this->_precio);
            $pizzaExistente->AgregarCantidad($this->_cantidad);
            $retorno = 0;//actualizada
        } else {
            $this->_id = rand(1,100000);   
            array_push($pizzas, $this);
            if (!file_exists('ImagenesDePizzas/')) {
                mkdir('ImagenesDePizzas/', 0777, true);
            }
            $destino = "ImagenesDePizzas/" . $this->_tipo . "-" . $this->_sabor . ".jpg";
            move_uploaded_file($rutaFoto, $destino);
        }
        Pizza::GuardarPizzas($pizzas, $nombreArchivo);
        }
        catch (Exception)
        {
            $retorno = -1;//error
        }
        
        return $retorno;
    }


    public function RetornarPizzaIgual($pizzas){
        for ($x = 0; $x < count($pizzas); $x++){
            if ($this->_sabor == $pizzas[$x]->_sabor &&
                $this->_tipo == $pizzas[$x]->_tipo){
                    return $pizzas[$x];
            }
        }
        return null;
        
    }

    public static function GuardarPizzas($pizzas, $nombreArchivo){
        PizzaDatosJSON::PizzasToJson($pizzas, $nombreArchivo);
    }

    public static function ObtenerPizzas($nombreArchivo){
        return PizzaDatosJSON::JsonToPizzas($nombreArchivo);
    }
    


  

    /**
     * Get the value of _sabor
     */ 
    public function get_sabor()
    {
        return $this->_sabor;
    }

    /**
     * Get the value of _precio
     */ 
    public function get_precio()
    {
        return $this->_precio;
    }

    /**
     * Get the value of _tipo
     */ 
    public function get_tipo()
    {
        return $this->_tipo;
    }

    /**
     * Get the value of _cantidad
     */ 
    public function get_cantidad()
    {
        return $this->_cantidad;
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
     * Set the value of _precio
     *
     * @return  self
     */ 
    public function set_precio($_precio)
    {
        $this->_precio = $_precio;

        return $this;
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
     * Get the value of _id
     */ 
    public function get_id()
    {
        return $this->_id;
    }
}



?>