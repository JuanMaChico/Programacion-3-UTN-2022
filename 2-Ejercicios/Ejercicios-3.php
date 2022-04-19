<?php
/*
Aplicación No 12 (Invertir palabra).
Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.
 */

function InvertirPalabra($palabra)
{
    $palabraInvertida = "";
    for ($i = strlen($palabra) - 1; $i >= 0; $i--) {
        $palabraInvertida .= $palabra[$i];
    }
    return $palabraInvertida;
}

echo InvertirPalabra("HOLA");

/*
Aplicación No 13 (Invertir palabra).
Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
1 si la palabra pertenece a algún elemento del listado.
0 en caso contrario.
 */

function ValidarPalabra($palabra, $max)
{
    $palabrasValidas = array("Recuperatorio", "Parcial", "Programacion");

    if ((strlen($palabra) < $max) && (in_array($palabra, $palabrasValidas))) {

        return 1;

    } else {

        return 0;
    }

}

echo "<br> Ejercicio 13: " . ValidarPalabra("Parcial", 10);
