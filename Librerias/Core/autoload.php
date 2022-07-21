<?php

spl_autoload_register(function ($class) {
    if (file_exists("Librerias/" . 'Core/' . $class . ".php")) {
        require_once ("Librerias/" . 'Core/' . $class . ".php");
    }
});

// EOF
