<?php
//   -En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los
//      métodos.

require_once("Parte-5.php");

echo "<br> Ejercicio Garage <br>";

$garage = new Garage("Mi Cochera", 10);

$garage->MostrarGarage();

$auto1 = new Auto("Ford", "Rojo",(Float)20000);
$auto2 = new Auto("Ford", "Rojo",(Float)30000);
$auto3 = new Auto("VW", "Negro",(Float)40000, new DateTime());
$auto4 = new Auto("VW", "Negro",(Float)40000, new DateTime());
$auto5 = new Auto("Nissan", "Blanco",(Float)740000, new DateTime());
$auto6 = new Auto("Ferrari", "Amarillo",(Float)40000, new DateTime());
$auto7 = new Auto("Fiat", "Naranja",(Float)40000, new DateTime());

echo "<br>";
echo $garage->Add($auto1);
echo "<br>";
echo $garage->Add($auto2);
echo "<br>";
echo $garage->Add($auto3);
echo "<br>";
echo $garage->Add($auto4);
echo "<br>";
echo $garage->Add($auto5);
echo "<br>";
echo $garage->Add($auto6);
echo "<br>";
echo $garage->Add($auto7);
echo "<br>";

$garage->MostrarGarage();

$garage->Remover($auto1);

$garage->MostrarGarage();





















?>