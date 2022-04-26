<?php

/**
 * @desc Test del Ejercicio Numero 17 (Clase Auto POO)
 */

//Incluimos la Clase Auto
require_once ("Parte-4.php");
/*
En testAuto.php:

    Crear dos objetos “Auto” de la misma marca y distinto color.

    ● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio. X
    ● Crear un objeto “Auto” utilizando la sobrecarga restante. X
    ● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
    al atributo precio.
    ● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
    resultado obtenido.
    ● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o
    no.
    ● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1,3,5)

 */

echo "<h5>Test del Ejercicio Numero 17 (Clase Auto POO)</h5>";
$auto1 = new Auto("Ford", "Rojo",(Float)20000);
echo Auto::MostrarAuto($auto1);
echo "<br><br>";

$auto2 = new Auto("Ford", "Rojo",(Float)30000);
echo Auto::MostrarAuto($auto2);
echo "<br><br>";

$auto3 = new Auto("VW", "Negro",(Float)40000, new DateTime());
echo Auto::MostrarAuto($auto3);
echo "<br><br>";

$auto1->AgregarImpuestos(1500);
$auto2->AgregarImpuestos(1500);
$auto3->AgregarImpuestos(1500);

echo "<br> Valor de Auto 1 Mas Auto 2 <br>";
echo Auto::add( $auto1, $auto2 );
echo "<br><br>";
echo "<br>Comparacion de Auto 1 con auto 2<br>";
echo $auto1->Equals($auto2);






?>