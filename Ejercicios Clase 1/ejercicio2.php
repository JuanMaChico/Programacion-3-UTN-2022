
<?php

/*
Aplicación No 6 (Carga aleatoria).

Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado.
 */
echo "<h1> Parte 2 Ejercicio 6 Programacion III </h1>";

$numeros = array(rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10));

$promedio = 0;

foreach ($numeros as $numero) {
    $promedio = $promedio + $numero;
}

$promedio = $promedio / 5;

if ($promedio > 6) {
    echo "El promedio de los numeros es mayor que 6";
} elseif ($promedio < 6) {
    echo "El promedio de los numeros es menor que 6";
} else {
    echo "El promedio de los numeros es igual que 6";
}

/*
Aplicación No 7 (Mostrar impares).

Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta <br/>).
Repetir la impresión de los números utilizando
las estructuras while y foreach.
 */
echo "<h1> Parte 2 Ejercicio 7 Programacion III </h1>";

$contador = 0;
$arrayImpares = [];

do {
    $contador++;
    if ($contador % 2 != 0) {
        array_push($arrayImpares, $contador);
    }
} while (count($arrayImpares) < 10);

echo "Imprimimos Numeros Impares<br>";
foreach ($arrayImpares as $variable) {
    echo "-".$variable;
}

echo "<br> Imprimimos Usando For <br>";
for ( $i=0; $i < count($arrayImpares) ; $i++ ){ 
    echo "-".$arrayImpares[$i];
}
echo "<br>Imprimimos con While <br>";
$contador = 0;
while ( $contador < count($arrayImpares)) {
    echo "-".$arrayImpares[$contador];
    $contador++;
}

/*
    Aplicación No 8 (Carga aleatoria).

    Imprima los valores del vector asociativo siguiente usando la estructura de control foreach:
    $v[1]=90; $v[30]=7; $v['e']=99; $v['hola']= 'mundo';
*/
echo "<h1> Parte 2 Ejercicio 8 Programacion III </h1>";

$v[1]=90;
$v[30]=7; 
$v['e']=99; 
$v['hola']= 'mundo';

foreach ($v as $key => $value) {
   echo "La clave es: ".$key." y el valor es: ".$value."<br>";
}


/*
    Aplicación No 9 (Arrays asociativos).

    Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
    contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
    lapiceras.
*/
echo "<h1> Parte 2 Ejercicio 9 Programacion III </h1>";

$lapicera1 = array(
    "color" => "azul",
    "marca" => "bic",
    "trazo" => "grueso",
    "precio" => "10"
);
$lapicera2 = array(
    "color" => "negro",
    "marca" => "bic",
    "trazo" => "fino",
    "precio" => "12"
);
$lapicera3 = array(
    "color" => "rojo",
    "marca" => "bic",
    "trazo" => "grueso",
    "precio" => "15"
);

$lapiceras = array($lapicera1, $lapicera2, $lapicera3);

foreach ($lapiceras as $l) {
    echo "<br>Lapicera<br>";
    foreach ($l as $key => $value) {
        echo $key.": ".$value."<br>";
    }
}

/*
    Aplicación No 10 (Arrays de Arrays).

    Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
    contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
    Arrays de Arrays.
*/
echo "<h1> Parte 2 Ejercicio 10 Programacion III </h1>";

$lapicera1 = array(
    "color" => "azul",
    "marca" => "bic",
    "trazo" => "grueso",
    "precio" => "10"
);
$lapicera2 = array(
    "color" => "negro",
    "marca" => "bic",
    "trazo" => "fino",
    "precio" => "12"
);
$lapicera3 = array(
    "color" => "rojo",
    "marca" => "bic",
    "trazo" => "grueso",
    "precio" => "15"
);

$lapiceras = array($lapicera1, $lapicera2, $lapicera3);

foreach ($lapiceras as $l) {
    echo "<br>Lapicera<br>";
    foreach ($l as $key => $value) {
        echo $key.": ".$value."<br>";
    }
}


?>