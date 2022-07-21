<?php

class Conexion
{
    private $conect;

    /**
     * __construct
     * Constructor por defecto
     * @return void
     */
    public function __construct()
    {
        $connectionString = "mysql:host=" . DB_SERVIDOR . ";dbname=" . DB_BASE_DATOS . ";.DB_CHARSET.";
        try {
            //code...
            $this->conect = new PDO($connectionString, DB_USUARIO, DB_PASSWORD);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            //throw $th;

            require_once "Controllers/ExcepcionesLogin.php";
            $notFound = new Errors();
            $notFound->mensaje = $e->getMessage();
            $notFound->not_found();

            //$this->conect = 'Error de conexión';

            //echo "ERROR: ". $e->getMessage();
        }
    }

    /**
     * conect
     * Funcion para conectarse
     * @return void
     */
    public function conect()
    {
        return $this->conect;
    }
}

// EOF
