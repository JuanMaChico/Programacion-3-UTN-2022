<?php

/**
 * @desc Corresponde a ejercicio Numero 4
 */

//Incluimos la Clase Auto
require_once ("Ejercicio-4.php");


/*
En testAuto.php:

    Crear dos objetos “Auto” de la misma marca y distinto color.

        ● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
        ● Crear un objeto “Auto” utilizando la sobrecarga restante.
        ● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
        al atributo precio.
        ● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
        resultado obtenido.
        ● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o
        no.
        ● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3,
        5)
 */

$autoTest = new Auto("Ford", "Rojo", 2500);
$autoTest1 = new Auto("Ford", "Rojo", 34000);
$autoTest2 = new Auto("Fiat", "Verde", 20030, "2018-03-01");
$autoTest3 = new Auto("VW", "Negro", 13454);
$autoTest4 = new Auto("VW", "Negro", 50000);

$autoTest->AgregarImpuestos(20);//Intancia


echo "<br>";
echo Auto::MostrarAuto($autoTest);//Clase
echo "<br>";
echo "<br>Precio sumado de auto 1 y auto 2 -> ".Auto::add($autoTest, $autoTest1);
echo "<br>";
echo $autoTest->Equals($autoTest1) ? "<br> Son iguales" : "<br> No son iguales";
echo "<br>";









?>