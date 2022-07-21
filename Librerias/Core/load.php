<?php

$controller = ucwords($controller);
$controllerFile = "Controllers/" . $controller . ".php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controller = new $controller();

    if (method_exists($controller, $metodo)) {
        $controller->{$metodo}($parametros);

    } else {
        require_once "Controllers/Error.php";

    }
} else {
    require_once "Controllers/Error.php";

}

// EOF
