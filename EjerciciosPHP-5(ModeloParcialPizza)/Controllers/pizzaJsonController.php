<?php


/**
 * @desc Guarda Data en Json, en el archivo pasado por parametro
 * @param $archivo Nombre del archivo
 * @param $data Data a guardar
 */
function GuardarJson($data, $archivo)
{
    if (file_exists($archivo)) {
        echo "Existe <br>";
        LeerJson($archivo);
    } else {
        echo "No existe <br>";
    }
}

function LeerJson($archivo)
{
    echo "Entro a leer <br>";
    $data = file_get_contents("pizza.json");
    $array = json_decode($data, true);
    print_r($array);
}

echo GuardarJson("asd", "pizza.json");