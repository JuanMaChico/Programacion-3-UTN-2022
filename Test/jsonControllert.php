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



// Created!
// You have successfully created a new database. The details are below.

// Username: DAgqIIGUWP

// Database name: DAgqIIGUWP

// Password: kDG7lEJRAW

// Server: remotemysql.com

// Port: 3306

// These are the username and password to log in to your database and phpMyAdmin

// Make sure you keep your password secure. Ensure you keep back ups of your database in case it gets deleted.
