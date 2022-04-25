<?php
//   -En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los
//      métodos.

require_once("Ejercicio-5.php");


$estacionamiento = new Garage("Estacionamiento", 10);

// $autoTest = new Auto("Ford", "Rojo", 2500);
// $autoTest1 = new Auto("Ford", "Rojo", 34000);
// $autoTest2 = new Auto("Fiat", "Verde", 20030, "2018-03-01");
// $autoTest3 = new Auto("VW", "Negro", 13454);
// $autoTest4 = new Auto("VW", "Negro", 50000);

// $estacionamiento->Add($autoTest);

$estacionamiento->MostrarGarage();
















?>