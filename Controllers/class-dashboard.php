<?php

class Dashboard extends Controllers
{
    /**
     * __construct
     * Constructor por defecto
     * @return void
     */
    public function __construct()
    {
        session_start();
        //session_regenerate_id(true);
        if (empty($_SESSION['login'])) {
            header('Location: ' . base_url() . '/login');
        }
        parent::__construct();

    }

    /**
     * initilize_dashboard
     * Asignación de Información
     * @return void
     */
    public function initilize_dashboard()
    {
        $data['page_id'] = 2;
        $data['page_tag'] = "Dashboard - Sistema Federacion de Arbritos";
        $data['page_title'] = "Federacion de Arbritos";
        $data['page_name'] = "dashboard";
        $data['page_functions_js'] = "functions_dashboard.js";
        $this->views->getView($this, "dashboard", $data);

    }

}

// EOF
