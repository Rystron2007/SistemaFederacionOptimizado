<?php

class Logout
{
    /**
     * __construct
     * Constructor por defecto
     * @return void
     */
    public function __construct()
    {
        session_start();
        session_unset();
        session_destroy();
        header('location: ' . base_url() . 'login');
    }
}

// EOF
