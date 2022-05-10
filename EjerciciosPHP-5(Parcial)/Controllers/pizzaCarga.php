<?php

//Incluimos Modelo
include 'pizzaJsonController.php';

$datos = new Pizza($_GET['sabor'], $_GET['tipo'], $_GET['precio'], $_GET['cantidad']);

createPizzajson();