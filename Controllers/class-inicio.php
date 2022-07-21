<?php

class Inicio extends Controllers
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
     * inicio
     * LLamado de la vista y los datos para usar en la vista
     * @return void
     */
    public function initilize_inicio()
    {
        $data['tag_page'] = "Inicio";
        $data['page_title'] = "Página de Inicio Correcto llamado";
        $data['page_name'] = "listo";

        $this->views->getView($this, "inicio", $data);
    }
}

// EOF
