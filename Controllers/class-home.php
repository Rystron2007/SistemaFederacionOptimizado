<?php

class Home extends Controllers
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
     * home
     * LLamado de la vista y los datos para usar en la vista
     * @return void
     */
    public function initilize_home()
    {
        $data['tag_page'] = "Home";
        $data['page_title'] = "Página prueba pepa";
        $data['page_name'] = "home";
        $this->views->getView($this, "home", $data);

    }
}

// EOF
