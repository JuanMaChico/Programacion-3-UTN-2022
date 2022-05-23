<?php


include_once "Heladeria.php";

Heladeria::VenderHelado($_POST["mail"], $_POST["sabor"], $_POST["tipo"], $_POST["stock"]);
