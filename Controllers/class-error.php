<?php

class Errors extends Controllers
{
    private $mensaje;

    /**
     * __construct
     * Constructor por defecto
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * not_found
     * Asignación de Información
     * @return void
     */
    public function not_found()
    {
        $data['tag_page'] = "Error";
        $data['page_title'] = "Página de Inicio funciaona";
        $data['page_name'] = "listo";
        $data['page_error'] = "Pagina no encontrada";
        $this->views->getView($this, "error", $data);
    }

}

$not_found = new Errors();
$not_found->not_found();

// EOF
