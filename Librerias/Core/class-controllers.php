<?php

class Controllers
{
    /**
     * __construct
     * Constructor por defecto
     * @return void
     */
    public function __construct()
    {
        $this->views = new Views();
        $this->load_model();
    }

    /**
     * load_model
     * Funcion para cargar todos los modelos
     * @return void
     */
    public function load_model()
    {
        //HomeModel
        $model = get_class($this) . "Model";
        $routClass = "Models/" . $model . ".php";
        if (file_exists($routClass)) {
            require_once $routClass;
            $this->model = new $model();
        }
    }
}

// EOF
