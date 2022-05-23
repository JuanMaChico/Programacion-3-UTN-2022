<?php


include_once "Heladeria.php";


$nuevaHeladeria = new Heladeria($_POST["sabor"], $_POST["precio"], $_POST["tipo"], $_POST["stock"]);



//alta de heladeria
echo Heladeria::AltaHeladeria($nuevaHeladeria);
