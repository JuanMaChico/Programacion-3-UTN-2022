<?php
//Consultas Helados dispinibles
include_once "Heladeria.php";




echo Heladeria::ConsultarHelado($_POST["sabor"], $_POST["tipo"]);
