<?php

//Apertura del archivo de texto
$archivo = fopen("archivo.txt", "r");

//Validamos que se abri correctamente
if ($archivo) {
    echo "<br> El archivo se abrio correctamente";
}

//Impresion por pantalla
echo "<br> --> Procesamos el archivo<br>";

while (!feof($archivo)) {
    
    echo "<br>Entra";
    echo fgets($archivo) . "<br>";

}
echo "<br> --> fgets()imprime hasta llegar al final del archivo <br>";

// Asi leemos el archivo
//echo "<br><br>Lectura del archivo<br>--->" . fread($archivo, filesize("archivo.txt")) . "<br><br>";

while (!feof($archivo)) {

    echo "Se llego el fin del archivo<br> Por eso no se imprime nada";
    echo fgets($archivo) . "<br>";

}

echo copy("archivo.txt", "copia.txt");

// echo unlink("copia.txt");

//Cerramos el archivo
if (fclose($archivo)) {
    echo "<br> El archivo se cerro correctamente";
}

?>