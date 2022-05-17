<?php
/*


Práctica parcial Bacchetta Tomás



*/
switch ($_SERVER["REQUEST_METHOD"]){
    case "GET":
        switch (key($_GET)){
            case 'cargarpizzaget':
                include_once "PizzaCarga.php";
                break;
        }
    break;
    case "POST":
        switch (key($_POST)){
            case 'consultarpizzapost':
                include_once "PizzaConsultar.php";
                break;
        }
        break;
        
}

?>