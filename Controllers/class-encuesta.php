<?php

class Encuesta extends Controllers
{
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
     * encuesta
     * Asignación de Información
     * @return void
     */
    public function encuesta()
    {
        $data['tag_page'] = "Encuesta";
        $data['page_title'] = "Página de Encuesta";
        $data['page_name'] = "encuenta";
        $this->views->getView($this, "encuesta", $data);
    }

}

// EOF
