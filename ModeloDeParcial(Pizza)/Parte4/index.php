<?php
/*


Práctica parcial Bacchetta Tomás



*/
switch ($_SERVER["REQUEST_METHOD"]){
    case "PUT":
        include_once 'ModificarVenta.php'; 
        break;
    case "POST":
        switch (key($_POST)){
            case 'consultarpizzapost':
                include_once "PizzaConsultar.php";
                break;
            case 'altaventapost':
                include_once "AltaVenta.php";
                break;
            case 'consultarventapost':
                include_once "ConsultasVentas.php";
                break;
            case 'cargarpizzapost':
                include_once "PizzaCarga.php";
                break;  
        }
        break;
    case "DELETE":
        include_once "borrarVenta.php";
        break;
        
}

?>