<?php

// 1-
//  A- (1 pt.) index.php:Recibe todas las peticiones que realiza el postman, y administra a que archivo se debe incluir.

//  B- (1 pt.) PizzaCarga.php: (por GET)se ingresa Sabor, precio, Tipo (“molde” o “piedra”), cantidad( de unidades). Se
    // guardan los datos en en el archivo de texto Pizza.json, tomando un id autoincremental como
    // identificador(emulado) .Sí el sabor y tipo ya existen , se actualiza el precio y se suma al stock existente.

// 2-(1pt.) PizzaConsultar.php: (por POST)Se ingresa Sabor,Tipo, si coincide con algún registro del archivo Pizza.json,
// retornar “Si Hay”. De lo contrario informar si no existe el tipo o el sabor.

switch ($_SERVER['REQUEST_METHOD']) {

    case 'GET':
        switch (key($_GET)) {
            case 'PizzaCarga':
                include_once 'Controllers/pizzaCarga.php';
                break;
            default:
                echo "Peticion no reconocida";
                break;
        }
        break;

    case 'POST':
        switch (key($_POST)) {
            case 'PizzaConsulta':
                include_once 'pizzaConsulta.php';
                break;
            default:
                echo "Peticion no reconocida";
                break;
        }
        break;
    default:
        echo '<br>peticion no soportada<br>';
        break;
}