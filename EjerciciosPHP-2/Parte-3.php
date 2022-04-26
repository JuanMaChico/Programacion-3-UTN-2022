<?php
/*
Aplicación No 12 (Invertir palabra).

Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.
 */

echo "Ejercicio 12: Invertir palabra <br>";

function InvertirPalabra($palabra)
{
    $palabraInvertida = "";
    for ($i = strlen($palabra) - 1; $i >= 0; $i--) {
        $palabraInvertida .= $palabra[$i];
    }
    return $palabraInvertida;
}

echo "<br> Ejecucion de Nuestra funcion => " . InvertirPalabra("HOLA");
echo "<br>";
echo "<br> Funcion de PHP String Reverse => " . strrev("HOLA");
echo "<hr>";

/*
Aplicación No 13 (Invertir palabra).

Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
1 si la palabra pertenece a algún elemento del listado.
0 en caso contrario.
 */

function ValidarPalabra($palabra, $max)
{
    $palabrasValidas = array("Recuperatorio", "Parcial", "Programacion");

    if ((strlen($palabra) < $max) && (in_array($palabra, $palabrasValidas))) {

        return 1;

    } else {

        return 0;
    }

}

echo "<br> Ejercicio 13: " . ValidarPalabra("Parcial", 10);
echo "<hr>";
echo "<br> Ejercicio 15 <br><br>";
/*
Aplicación Nº 15 (Figuras geométricas).

La clase FiguraGeometrica posee: todos sus atributos protegidos, un constructor por defecto,
un método getter y setter para el atributo _color, un método virtual (ToString) y dos
métodos abstractos: Dibujar (público) y CalcularDatos (protegido).
CalcularDatos será invocado en el constructor de la clase derivada que corresponda, su
funcionalidad será la de inicializar los atributos _superficie y _perimetro.
Dibujar, retornará un string (con el color que corresponda) formando la figura geométrica del
objeto que lo invoque (retornar una serie de asteriscos que modele el objeto).
    Ejemplo:
    *      *******
    ***     *******
    *****    *******
    Utilizar el método ToString para obtener toda la información completa del objeto, y luego
    dibujarlo por pantalla.
*/
    
abstract class FiguraGeometrica
{
    protected $_color;
    protected $_perimetro;
    protected $_superficie;

    public function __construct()
    {
        $this->_color = "";
        $this->_perimetro = 0;
        $this->_superficie = 0;
    }

    public function GetColor()
    {
        return $this->_color;
    }

    public function SetColor($color)
    {
        $this->_color = $color;
    }

    public function ToString()
    {
        return "Color: " . $this->_color . "<br>Perimetro: " . $this->_perimetro . "<br>Superficie: " . $this->_superficie;
    }

    abstract protected function CalcularDatos();
    abstract public function Dibujar();
    
}


class Rectangulo extends FiguraGeometrica
{
    protected $_ladoUno;
    protected $_ladoDos;


    public function __construct($ladoUno, $ladoDos)
    {
        parent::__construct();
        $this->_ladoUno = $ladoUno;
        $this->_ladoDos = $ladoDos;
        $this->CalcularDatos();
    }

    protected function CalcularDatos()
    {
        $this->_perimetro = $this->_ladoUno * 2 + $this->_ladoDos * 2;
        $this->_superficie = $this->_ladoUno * $this->_ladoDos;
    }

    public function Dibujar()
    {
        $dibujo = "";
        for ($i = 0; $i < $this->_ladoUno; $i++) {
            for ($j = 0; $j < $this->_ladoDos; $j++) {
                $dibujo .= "*";
            }
            $dibujo .= "<br>";
        }
        return $dibujo;
    }

    public function ToString()
    {
        return parent::ToString() . "<br>Lado 1: " . $this->_ladoUno . "<br>Lado 2: " . $this->_ladoDos;
    }
}

class Triangulo extends FiguraGeometrica
{
    protected $_base;
    protected $_altura;

    public function __construct($base, $altura)
    {
        parent::__construct();
        $this->_base = $base;
        $this->_altura = $altura;
        $this->CalcularDatos();
    }

    protected function CalcularDatos()
    {
        $this->_perimetro = $this->_base * 3;
        $this->_superficie = $this->_base * $this->_altura / 2;
    }

    public function Dibujar()
    {
        $dibujo = "";

        for ($i = 0; $i < $this->_altura; $i++) {
            for ($j = 0; $j < $this->_base; $j++) {
                if ($i == 0 || $i == $this->_altura - 1) {
                    $dibujo .= "*";
                } else {
                    if ($j == 0 || $j == $this->_base - 1) {
                        $dibujo .= "*";
                    } else {
                        $dibujo .= "&nbsp;";
                    }
                }
            }
            $dibujo .= "<br>";
        }

        return $dibujo;
    }

    public function ToString()
    {
        return parent::ToString() . "<br>Base: " . $this->_base . "<br>Altura: " . $this->_altura;
    }   
    
}
echo "<br> <h3>Triangulo</h3> <br>";
$triangulo = new Triangulo(5, 5);
$triangulo->SetColor("Amarillo");
echo $triangulo->ToString();
echo "<br><br>";
echo $triangulo->Dibujar();

echo "<br> <h3>Rectangulo</h3> <br>";
$rectangulo = new Rectangulo(5, 15);
$rectangulo->SetColor("Azul");
echo $rectangulo->ToString();
echo "<br><br>";
echo $rectangulo->Dibujar();


echo "<hr>";
echo "<br> Ejercicio 16 <br>";
/*
    Aplicación Nº 16 (Rectangulo - Punto)
    Codificar las clases Punto y Rectangulo.
    
    La clase Punto ha de tener dos atributos privados con acceso de sólo lectura (sólo con
    getters), que serán las coordenadas del punto. Su constructor recibirá las coordenadas del
    punto.
    La clase Rectangulo tiene los atributos privados de tipo Punto _vertice1, _vertice2, _vertice3
    y _vertice4 (que corresponden a los cuatro vértices del rectángulo).
    La base de todos los rectángulos de esta clase será siempre horizontal. Por lo tanto, debe tener
    un constructor para construir el rectángulo por medio de los vértices 1 y 3.
    Los atributos ladoUno, ladoDos, área y perímetro se deberán inicializar una vez construido el
    rectángulo.
    Desarrollar una aplicación que muestre todos los datos del rectángulo y lo dibuje en la página
*/
class Punto
{
    private $_x;
    private $_y;

    public function __construct($x, $y)
    {
        $this->_x = $x;
        $this->_y = $y;
    }

    public function GetX()
    {
        return $this->_x;
    }

    public function GetY()
    {
        return $this->_y;
    }
    
}

class Rectangulo2
{
    
    private Punto $_vertice1;
    private Punto $_vertice2;
    private Punto $_vertice3;
    private Punto $_vertice4;

    public $_area;
    public $_perimetro;
    public $_ladoUno;
    public $_ladoDos;

    public function __construct(Punto $vertice1, Punto $vertice3)
    {
        $this->_vertice1 = $vertice1;
        $this->_vertice3 = $vertice3;
        $this->_vertice2 = new Punto($vertice1->GetX(), $vertice3->GetY());
        $this->_vertice4 = new Punto($vertice3->GetX(), $vertice1->GetY());
        $this->_ladoUno = $this->_vertice1->GetX() - $this->_vertice3->GetX();
        $this->_ladoDos = $this->_vertice1->GetY() - $this->_vertice3->GetY();
        $this->_area = $this->_ladoUno * $this->_ladoDos;
        $this->_perimetro = $this->_ladoUno * 2 + $this->_ladoDos * 2;        
    }

    public function Dibujar(){
        $dibujo = "";
        for ($i = 0; $i < $this->_ladoUno; $i++) {
            for ($j = 0; $j < $this->_ladoDos; $j++) {
                $dibujo .= "*";
            }
            $dibujo .= "<br>";
        }
        return $dibujo;
    }
}

$rectangulo2 = new Rectangulo2(new Punto(5, 5), new Punto(15, 15));

echo "<br> <h3>Rectangulo</h3> <br>";
echo $rectangulo2->Dibujar();





echo "<hr>";
