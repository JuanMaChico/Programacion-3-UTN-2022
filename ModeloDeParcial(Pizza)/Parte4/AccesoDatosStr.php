<?php
/*
Práctica parcial Bacchetta Tomás



*/
class AccesoDatosStr{

    public static function AbrirStr($nombreArchivo){
        $str = "";
        if (file_exists($nombreArchivo)){
            $archivo = fopen($nombreArchivo, "r");
            if ($archivo != NULL){
                $tamanioArchivo = filesize($nombreArchivo);
                if ($tamanioArchivo > 0){
                    $str = fread($archivo, $tamanioArchivo);
                }
                fclose($archivo);
            } 
        
        } 
        return $str;
        
    }

    public static function GuardarStr($str, $nombreArchivo){
        $archivo = fopen($nombreArchivo, "w");
        if (fwrite($archivo, $str) != false){
            fclose($archivo);
            return 1;
        }
        fclose($archivo);
        return 0;
    }
}

?>