<?php
//Devolver helado

//consigna:
// 6- (2 pts.) DevolverHelado.php (por POST), 
// Guardar en el archivo (devoluciones.json y cupones.json): 
// a- Se ingresa el número de pedido y la causa de la devolución. El número de pedido debe existir,
// se ingresa una foto del cliente enojado, esto debe generar un cupón de descuento ( id,devolucion_id,
// porcentajeDescuento, estado[usado/no usadol] ) con el 10% de descuento para la próxima compra. 

include_once "Heladeria.php";
include_once "JsonController.php";

echo "Devolver Helado<br>";

$consulta = Heladeria::ConsultaVentaPorId($_POST["idVenta"]);

$devoluciones = JsonController::LeerArchivoCupones("devoluciones.json");

if (!file_exists("ImagenesDeClientesEnojados")) {
    mkdir('ImagenesDeClientesEnojados/', 0777, true);
}

foreach ($consulta as $key => $value) {

    echo "<br>";
    echo "------------------------------<br>";
    echo "Id Venta: " . $value["id"] . "<br>";
    echo "Email: " . $value["email"] . "<br>";
    echo "Baja: " . $value["baja"] . "<br>";
    echo "------------------------------<br>";

    if ($value["id"] == $_POST["idVenta"]) {
        echo "<br>La venta existe<br>";

        if ($devoluciones == "") {
            $devoluciones = array();
            array_push($devoluciones, array(
                "id" => 1,
                "idVenta" => $value["id"],
                "causa" => $_POST["motivo"],
                "estado" => "no usado"
            ));
            JsonController::CrearArchivoDevoluciones("devoluciones.json", $devoluciones);
            Heladeria::BajarVentaSql($value["id"]);
            $imagen = $_FILES["archivo"];
            $destino = "ImagenesDeClientesEnojados/" . "IdVenta" . $value["id"] . ".png";
            echo move_uploaded_file($imagen["tmp_name"], $destino);
        } else {
            foreach ($devoluciones as $key => $value) {
                if ($_POST["idVenta"] == $value["idVenta"]) {
                    echo "La venta fue devuelta<br>";
                    $flag = false;
                    break;
                } else {
                    $flag = true;
                }
            }
            if ($flag) {
                array_push($devoluciones, array(
                    "id" => count($devoluciones) + 1,
                    "idVenta" => $value["id"],
                    "causa" => $_POST["motivo"],
                    "estado" => "no usado"
                ));
                JsonController::GuardarArchivo("devoluciones.json", $devoluciones);
                Heladeria::BajarVentaSql($value["id"]);
                $imagen = $_FILES["archivo"];
                $destino = "ImagenesDeClientesEnojados/" . "IdVenta" . $value["id"] . ".png";
                echo move_uploaded_file($imagen["tmp_name"], $destino);
            }
        }
    } else {
        echo "La venta no existe<br>";
    }
}
