<?php

include_once 'pizza.php';
//Controlador del JSON PIZZA


function createPizzajson()
{
    try {
        $archivo = fopen("pizzaJson.json", "w");
        $myArray = array();
        fwrite($archivo, json_encode($myArray));
        fclose($archivo);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

function readPizzajson()
{
    $archivo = fopen("pizzaJson.json", "r");
    $retorno = fread($archivo, filesize("pizzaJson.json"));
    fclose($archivo);
    return $retorno;
}