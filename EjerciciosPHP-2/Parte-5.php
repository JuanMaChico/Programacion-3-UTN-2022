<?php

//Importamos la clase auto
require_once ("Parte-4.php");

/*
    Aplicación No 18 (Auto - Garage)
    Crear la clase Garage que posea como atributos privados:

    _razonSocial (String)
    _precioPorHora (Double)
    _autos (Autos[], reutilizar la clase Auto del ejercicio anterior)

    Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:

    i. La razón social.
    ii. La razón social, y el precio por hora.

    -Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
    que mostrará todos los atributos del objeto.

    -Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
    objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.

    -Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
    (sólo si el auto no está en el garaje, de lo contrario informarlo).

    Ejemplo: $miGarage->Add($autoUno);

    -Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
    “Garage” (sólo si el auto está en el garaje, de lo contrario informarlo).

    Ejemplo: $miGarage->Remove($autoUno);

    -En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los
    métodos.

 */

class Garage
{

    private String $_razonSocial;
    private Float $_preciosPorHora;
    private $_autos = array();

    public function __construct($razonSocial, $precioPorHora = 0)
    {
        $this->_razonSocial = $razonSocial;
        $this->_preciosPorHora = $precioPorHora;
    }

    public function MostrarGarage(){
        echo "<br>Informacion del Garage<br>";
        echo "Razon Social: ".$this->_razonSocial."<br>";
        echo "Precio por hora: $".$this->_preciosPorHora."<br>";
        if ( count($this->_autos) > 0 ){
            echo "Lista de Autos: <br>";
            foreach ($this->_autos as $auto){
               echo "<br>".Auto::MostrarAuto($auto)."<br>";
            }
        }else{
            echo "<br> No hay autos en ".$this->_razonSocial."<br>";
        }
    }

    public function Equals($auto){
        foreach ($this->_autos as $autoGarage){
            if($autoGarage->Equals($auto)){
                return true;
            }
        }
        return false;
    }

    public function Add($auto){
        if(!$this->Equals($auto)){
            array_push($this->_autos, $auto);
        }else{
            return "El auto ya esta en el garage";
        }
    }

    public function Remover($auto){
        if($this->Equals($auto)){
            foreach ($this->_autos as $key => $value){
                if($value->Equals($auto)){
                    unset($this->_autos[$key]);
                }
            }
        }else{
            return "El auto no esta en el garage";
        }
    }


}
