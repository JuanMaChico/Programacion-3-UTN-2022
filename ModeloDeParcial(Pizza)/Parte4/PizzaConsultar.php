<?php

/*
Práctica parcial Bacchetta Tomás



*/



include_once "pizza.php";
$pizzaAConsultar = new Pizza("", $_POST["sabor"], "", $_POST["tipo"], 0); 
$pizzaExistente = $pizzaAConsultar->RetornarPizzaIgual(Pizza::ObtenerPizzas("Pizza.json"));

if (isset($pizzaExistente)){
    echo "Si hay";
} else {
    echo "No existe el tipo o el sabor";
}



?>