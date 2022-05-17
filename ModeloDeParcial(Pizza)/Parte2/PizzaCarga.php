<?php


/*
Práctica parcial Bacchetta Tomás





*/

include_once "pizza.php";
$nuevaPizza = new Pizza("", $_GET["sabor"], $_GET["precio"], $_GET["tipo"], $_GET["cantidad"]);
switch ($nuevaPizza->DarDeAlta("Pizza.json")){
    case 1:
        echo "Dada de alta";
        break;
    case 0:
        echo "Actualizada";
        break;
    case -1:
        echo "Error";
        break;

}





?>