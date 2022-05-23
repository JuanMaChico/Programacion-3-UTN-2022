<?php
//Clase controladora de Archivos JSON.


class JsonController
{

    /**
     * Lee un archivo y retorna un array de objetos.
     * @param string $archivo Nombre del archivo a leer.
     */
    public static function LeerArchivo($Archivo)
    {
        $retorno = "";
        if (file_exists($Archivo)) {
            $retorno = file_get_contents($Archivo);
            $miarray = json_decode($retorno);
            return array_map(function ($h) {
                return new Heladeria($h->_sabor, $h->_precio, $h->_tipo, $h->_stock);
            }, $miarray);
        } else {
            echo "El archivo no existe<br>";
        }
        return $retorno;
    }

    public static function GuardarArchivo($Archivo, $data)
    {
        if (file_exists($Archivo)) {
            $Archivo = fopen($Archivo, "w");
            fwrite($Archivo, json_encode($data));
            fclose($Archivo);
        }
    }

    public static function CrearArchivo($Archivo, $data)
    {
        if (!file_exists($Archivo)) {
            $Archivo = fopen($Archivo, "w");
            $arrayDeHeladerias = array();
            array_push($arrayDeHeladerias, $data);
            fwrite($Archivo, json_encode($arrayDeHeladerias));
            fclose($Archivo);
        }
    }

    public static function LeerArchivoCupones($Archivo)
    {
        $retorno = "";
        if (file_exists($Archivo)) {
            $retorno = file_get_contents($Archivo);
            $miarray = json_decode($retorno, true);
            return $miarray;
        } else {
            echo "<br>El archivo no existe<br>";
        }
        return $retorno;
    }

    public static function CrearArchivoDevoluciones($Archivo, $data)
    {
        if (!file_exists($Archivo)) {
            $Archivo = fopen($Archivo, "w");
            fwrite($Archivo, json_encode($data));
            fclose($Archivo);
        }
    }
}
