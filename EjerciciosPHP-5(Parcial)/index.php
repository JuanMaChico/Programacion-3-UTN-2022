<?php


switch ($_SERVER['REQUEST_METHOD']) {

    case 'POST':

        switch (key($_POST)) {
            case 'case1':
                echo "<br>Case 1<br>";
                break;
        }

    case 'GET':

        switch (key($_GET)) {
            case 'case1':
                echo "<br>Case 1<br>";
                include_once './pizzaCarga.php';
                break;
        }

        break;

    default:
        echo '<br>peticion no soportada<br>';
        break;
}