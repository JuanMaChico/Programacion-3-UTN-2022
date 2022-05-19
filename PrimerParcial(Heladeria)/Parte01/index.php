<?php

// 1-
// A- (1 pt.) index.php:Recibe todas las peticiones que realiza el postman, y administra a qué archivo se debe incluir.

// B- (1 pt.) HeladeriaAlta.php: (por POST) se ingresa Sabor, Precio, Tipo (“agua” o “crema”), Stock(unidades).
// Se guardan los datos en en el archivo de texto heladeria.json, tomando un id autoincremental como
// identificador(emulado) .Sí el nombre y tipo ya existen , se actualiza el precio y se suma al stock existente.

// completar el alta con imagen del helado, guardando la imagen con el sabor y tipo como identificación en la
// carpeta /ImagenesDeHelados.

// 2-
// (1pt.) HeladoConsultar.php: (por POST) Se ingresa Sabor y Tipo, si coincide con algún registro del archivo
// heladeria.json, retornar “existe”. De lo contrario informar si no existe el tipo o el nombre.

// 3-
// a- (1 pts.) AltaVenta.php: (por POST) se recibe el email del usuario y el Sabor, Tipo y Stock, si el ítem existe en
// heladeria.json, y hay stock guardar en la base de datos( con la fecha, número de pedido y id autoincremental ) .
// Se debe descontar la cantidad vendida del stock.
// b- (1 pt) Completar el alta de la venta con imagen de la venta (ej:una imagen del usuario), guardando la imagen
// con el sabor+tipo+mail(solo usuario hasta el @) y fecha de la venta en la carpeta /ImagenesDeLaVenta.



//Evaluamos el metodo
switch ($_SERVER["REQUEST_METHOD"]) {
    case "POST":
        switch (key($_POST)) {
            case 'HeladeriaAlta':
                include_once "HeladeriaAlta.php";
                break;
            case 'HeladoConsultar':
                include_once "HeladoConsultar.php";
                break;
            case 'AltaVenta':
                include_once "AltaVenta.php";
                break;
            default:
                echo "Peticion POST No Soportada...";
                break;
        }
        break;
    default:
        echo "Peticion No Soportada...";
        break;
}
