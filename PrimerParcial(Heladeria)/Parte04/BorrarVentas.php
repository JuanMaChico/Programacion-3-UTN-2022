<?php
//Borrar Ventas
include_once "Heladeria.php";
//Consigna:
// 7- (1 pts.) borrarVenta.php (por DELETE), debe recibir un número de pedido,
// se borra la venta(soft-delete, no físicamente)
// y la foto relacionada a esa venta debe moverse a la carpeta /ImagenesBackupVentas. 
echo "<br>Borrar Ventas<br>";


$ventas = Heladeria::ConsultaVentaPorId($_REQUEST['idVenta']);
Heladeria::BajarVentaSql($_REQUEST['idVenta']);

if (!file_exists("ImagenesBackupVentas")) {
    mkdir('ImagenesBackupVentas/', 0777, true);
}
$path = "ImagenesDeVentas/";
$dir = opendir($path);

foreach ($ventas as $key => $value) {
    if ($value['id'] == $_REQUEST['idVenta']) {
        while ($elemento = readdir($dir)) {
            if (stripos($elemento, $value['sabor'] . "_" . $value['tipo']) !== false) {
                if (copy($path . $elemento, "ImagenesBackupVentas/" . $elemento)) {
                    echo "Copiado correctamente";
                } else {
                    echo "No se pudo copiar";
                }
            }
        }
    }
}
