<?php

//Incluimos Modelo
include 'Models/pizza.php';

echo "Entramos por GET <br>";

$datos = new Pizza($_GET['sabor'], $_GET['tipo'], $_GET['precio'], $_GET['cantidad']);

echo Pizza::guardarEnJson($datos);