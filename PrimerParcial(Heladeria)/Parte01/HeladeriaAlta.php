<?php
//Controlador de alta de heladeria

// B- (1 pt.) HeladeriaAlta.php: (por POST) se ingresa Sabor, Precio, Tipo (“agua” o “crema”), Stock(unidades).
// Se guardan los datos en en el archivo de texto heladeria.json, tomando un id autoincremental como
// identificador(emulado) .Sí el nombre y tipo ya existen , se actualiza el precio y se suma al stock existente.

// completar el alta con imagen del helado, guardando la imagen con el sabor y tipo como identificación en la
// carpeta /ImagenesDeHelados.

include_once "Heladeria.php";


$nuevaHeladeria = new Heladeria($_POST["sabor"], $_POST["precio"], $_POST["tipo"], $_POST["stock"]);



//alta de heladeria
echo Heladeria::AltaHeladeria($nuevaHeladeria);
