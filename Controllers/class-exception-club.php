<?php

//Provee la clase de Club.
include_once "Librerias/Objetos/class-objeto-club.php";

class ErrorsClub extends Controllers
{
    private $objeto_club;
    public $mensaje;

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
        $data['page_title'] = "Página de Inicio No funciaona";
        $data['page_name'] = "listo";
        $data['page_mensaje'] = $this->mensaje;
        $this->views->getView($this, "error", $data);
    }
    /**
     * validate_request
     *
     * @param  mixed $request
     * @return void
     */
    public function validate_request($request)
    {
        if (empty($request)) {
            throw new Exception('Datos no encontrados.');
        }
        return true;
    }

    /**
     * validate_vacio
     *
     * @param  mixed $club_solicitado
     * @return void
     */
    public function validate_vacio(ObjClub $club_solicitado)
    {
        $this->objeto_club = $club_solicitado;
        if (empty($this->objeto_club->getCodigoClub()) || empty($this->objeto_club->getNombreClub()) || empty($this->objeto_club->getCorreoClub())) {
            throw new Exception('Por favor revisar los campos Codigo - Nombre - Correo existe uno Vacio');
        }
        return true;
    }

    /**
     * validate_club
     *
     * @param  mixed $request_user
     * @return void
     */
    public function validate_club($request_user)
    {
        if ($request_user == 'exist') {
            throw new Exception('¡Atención! el club ya existe, ingrese otro.');
        }
        return true;
    }

    /**
     * validate_updated_club
     *
     * @param  mixed $request_user
     * @return void
     */
    public function validate_updated_club($request_user)
    {
        if ($request_user <= 0) {
            throw new Exception('No es posible almacenar los datos. Error interno intente mas tarde');
        }
        return true;
    }

    /**
     * validate_delete_club
     *
     * @param  mixed $request
     * @return void
     */
    public function validate_delete_club($request)
    {
        if ($request != true) {
            throw new Exception('Error al eliminar el Club.');
        }
        return true;
    }

    /**
     * validate_query
     *
     * @param  mixed $request
     * @return void
     */
    public function validate_query($request)
    {
        if (!empty($request)) {
            throw new Exception('exist');
        }
        return true;
    }

}

// EOF
