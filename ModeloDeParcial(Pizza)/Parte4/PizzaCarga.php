<?php


/*
Práctica parcial Bacchetta Tomás





*/

include_once "pizza.php";
$nuevaPizza = new Pizza("", $_POST["sabor"], $_POST["precio"], $_POST["tipo"], $_POST["cantidad"]);
switch ($nuevaPizza->DarDeAlta("Pizza.json", $_FILES["foto"]["tmp_name"])){
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