<?php

$array = array(

    array(
        "sabor" => "Jamon",
        "tipo" => "Molde",
        "precio" => "10",
        "cantidad" => "10"
    ),
    array(
        "sabor" => "Peperoni",
        "tipo" => "Molde",
        "precio" => "10",
        "cantidad" => "10"
    ),

);


function createJson($data)
{
    return json_encode($data);
}
echo createJson($array);
echo "<br><br>";
$json = createJson($array);

function readJson($data)
{
    return json_decode($data, true);
}

$datos = readJson($json);

foreach ($datos as $key => $value) {
    echo $value['sabor'] . " " . $value['tipo'] . " " . $value['precio'] . " " . $value['cantidad'] . "<br>";
}