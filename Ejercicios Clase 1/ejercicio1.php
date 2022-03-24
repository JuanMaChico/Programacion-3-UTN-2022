<?php


/*
    Juan Manuel Chico
    3C
*/



/*
    Aplicación No 1 (Sumar números).

    Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
    supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
    se sumaron.

 */
    echo "<h1> Ejercicio 1 Programacion III </h1>";
    
    
    $contador = 1;
    $suma = 1;
    
    while ( $suma < 1000 ){
        
        $contador++;
        $suma += $contador;
        
        if ($suma > 1000) {
            
            $suma = $suma - $contador;
            $contador--;
            break;
        }
        
    }
    echo "<br> Se sumaron $suma numeros";
    echo "<br> Se sumaron $contador";
    
 /* 
    Aplicación No 2 (Mostrar fecha y estación).

    Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
    distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
    año es. Utilizar una estructura selectiva múltiple.

 */
    echo "<h1> Ejercicio 2 Programacion III </h1>";

    echo "<br> Fecha actual: " . date("d/m/Y");
    echo "<br> Fecha actual: " . date("D/M/Y");
    echo "<br> Fecha actual: " . date("d-M-Y");
    echo "<br>";

    $mes = date("m");

    switch ( $mes ){
        
        case 12:
        case 1:
        case 2:
            echo "<br> Estamos en verano";
            break;
        case 3:
        case 4:
        case 5:
        case 6:
        case 7:
            echo "<br> Estamos en otoño";
            break;
        case 8:
        case 9:
        case 10:
        case 11:
            echo "<br> Estamos en invierno";
            break;
    }

/*
    Aplicación No 3 (Obtener el valor del medio).

    Dadas tres variables numéricas de tipo entero $a, $b y $c realizar una aplicación que muestre
    el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres
    variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido.
    Ejemplo 1: $a = 6; $b = 9; $c = 8; => se muestra 8.
    Ejemplo 2: $a = 5; $b = 1; $c = 5; => se muestra un mensaje “No hay valor del medio”

 */
    echo "<h1> Ejercicio 3 Programacion III </h1>";

    $a = 6;
    $b = 9;
    $c = 8;

    if ( ($a > $b) && ($a < $c) ){
        echo "<br> El valor del medio es: $a";
    } elseif ( ($b > $a) && ($b < $c) ){
        echo "<br> El valor del medio es: $b";
    } elseif ( ($c > $a) && ($c < $b) ){
        echo "<br> El valor del medio es: $c";
    } else {
        echo "<br> No hay valor del medio";
    }

    $a = 5;
    $b = 1;
    $c = 5;

    if ( ($a > $b) && ($a < $c) ){
        echo "<br> El valor del medio es: $a";
    } elseif ( ($b > $a) && ($b < $c) ){
        echo "<br> El valor del medio es: $b";
    } elseif ( ($c > $a) && ($c < $b) ){
        echo "<br> El valor del medio es: $c";
    } else {
        echo "<br> No hay valor del medio";
    }

/*
    Aplicación No 4 (Calculadora).

    Escribir un programa que use la variable $operador que pueda almacenar los símbolos
    matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras $op1 y $op2. De acuerdo al
    símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el
    resultado por pantalla.

*/
    echo "<h1> Ejercicio 4 Programacion III </h1>";

    $operador = "-";

    $op1 = 5;
    $op2 = 2;

    switch ( $operador ){
        case "+":
            echo "<br> El resultado es: " . ($op1 + $op2);
            break;
        case "-":
            echo "<br> El resultado es: " . ($op1 - $op2);
            break;
        case "/":
            echo "<br> El resultado es: " . ($op1 / $op2);
            break;
        case "*":
            echo "<br> El resultado es: " . ($op1 * $op2);
            break;
    }

/*
    Aplicación No 5 (Números en letras).

    Realizar un programa que en base al valor numérico de una variable $num, pueda mostrarse
    por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
    entre el 20 y el 60.
    Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.
*/
    echo "<h1> Ejercicio 5 Programacion III </h1>";

    $num = 43;

    if ( ($num >= 20) && ($num <= 60) ){

        switch ( $num ){
            case 20:
                echo "<br> Veinte";
                break;
            case 21:
                echo "<br> Veintiuno";
                break;
            case 22:
                echo "<br> Veintidos";
                break;
            case 23:
                echo "<br> Veintitres";
                break;
            case 24:
                echo "<br> Veinticuatro";
                break;
            case 25:
                echo "<br> Veinticinco";
                break;
            case 26:
                echo "<br> Veintiseis";
                break;
            case 27:
                echo "<br> Veintisiete";
                break;
            case 28:
                echo "<br> Veintiocho";
                break;
            case 29:
                echo "<br> Veintinueve";
                break;
            case 30:
                echo "<br> Treinta";
                break;
            case 31:
                echo "<br> Treinta y uno";
                break;
            case 32:
                echo "<br> Treinta y dos";
                break;
            case 33:
                echo "<br> Treinta y tres";
                break;
            case 34:
                echo "<br> Treinta y cuatro";
                break;
            case 35:
                echo "<br> Treinta y cinco";
                break;
            case 36:
                echo "<br> Treinta y seis";
                break;
            case 37:
                echo "<br> Treinta y siete";
                break;
            case 38:
                echo "<br> Treinta y ocho";
                break;
            case 39:
                echo "<br> Treinta y nueve";
                break;
            case 40:
                echo "<br> Cuarenta";
                break;
            case 41:
                echo "<br> Cuarenta y uno";
                break;
            case 42:
                echo "<br> Cuarenta y dos";
            case 43:
                echo "<br> Cuarenta y tres";

        }
    }

/*
    Juan Manuel Chico
    3C
*/

?>