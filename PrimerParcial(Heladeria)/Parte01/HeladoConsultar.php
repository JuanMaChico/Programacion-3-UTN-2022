<?php
//Consultas Helados dispinibles
include_once "Heladeria.php";

// 2-
// (1pt.) HeladoConsultar.php: (por POST) Se ingresa Sabor y Tipo, si coincide con algún registro del archivo
// heladeria.json, retornar “existe”. De lo contrario informar si no existe el tipo o el nombre.


echo Heladeria::ConsultarHelado($_POST["sabor"], $_POST["tipo"]);
