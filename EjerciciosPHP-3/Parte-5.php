<?php
/*
    Aplicación No 20 (Registro CSV).

    Archivo: registro.php
    método:POST
    Recibe los datos del usuario(nombre, clave, mail )por POST ,
    crear un objeto y utilizar sus métodos para poder hacer el alta,
    guardando los datos en usuarios.csv.
    retorna si se pudo agregar o no.
    Cada usuario se agrega en un renglón diferente al anterior.
    Hacer los métodos necesarios en la clase usuario
*/
echo "<h1>Registro de usuarios</h1>";
class Usuario
{
    private String $_nombre;
    private String $_clave;
    private String $_mail;

    public function __construct($nombre, $clave, $mail)
    {
        $this->_nombre = $nombre;
        $this->_clave = $clave;
        $this->_mail = $mail;
    }

    public function Guardar_CSV()
    {
        $archivo = fopen("usuarios.csv", "a");
        $renglon = $this->_nombre . "," . $this->_clave . "," . $this->_mail . "\n";
        fwrite($archivo, $renglon);
        fclose($archivo);
    }

    public static function Leer_CSV()
    {
        $archivo = fopen("usuarios.csv", "r");
        while (!feof($archivo)) {
            echo fgets($archivo) . "<br>";
        }
        fclose($archivo);
    }
}


switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $nombre = $_POST["nombre"];
        $clave = $_POST["clave"];
        $mail = $_POST["mail"];
        $usuario = new Usuario($nombre, $clave, $mail);
        $usuario->Guardar_CSV();
        echo "<br>Usuario agregado<br>";
        break;
    case 'GET':
        echo "<br>Get<br>";
        break;
    default:
        echo '<br>peticion no realizada<br>';
        break;
}


echo "<br>Leemos el CSV..<br><br>";
Usuario::Leer_CSV();
echo "<br><br>";


/*
    Aplicación No 21 ( Listado CSV y array de usuarios).

    Archivo: listado.php
    método:GET
    Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,...etc),por ahora solo tenemos usuarios).
    En el caso de usuarios carga los datos del archivo usuarios.csv.
    se deben cargar los datos en un array de usuarios.
    Retorna los datos que contiene ese array en una lista
        <ul>
            <li>Coffee</li>
            <li>Tea</li>
            <li>Milk</li>
        </ul>
    Hacer los métodos necesarios en la clase usuario
*/










/*
    Aplicación No 22 ( Login).

    Archivo: Login.php
    método:POST
    Recibe los datos del usuario(clave,mail )por POST ,
    crear un objeto y utilizar sus métodos para poder verificar si es un usuario registrado,
    Retorna un :
    “Verificado” si el usuario existe y coincide la clave también.
    “Error en los datos” si esta mal la clave.
    “Usuario no registrado si no coincide el mail“
    Hacer los métodos necesarios en la clase usuario
*/