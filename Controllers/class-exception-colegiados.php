<?php

//Provee la clase de Colegiado.
include_once "Librerias/Objetos/ObjColegiado.php";

class ErrorsColegiados extends Controllers
{
    private $objColegiado;
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
        $data['page_mensaje'] = $this->mensaje;
        $this->views->getView($this, "error", $data);
    }

    /**
     * validate_insert_query
     *
     * @param  mixed $request
     * @return void
     */
    public function validate_insert_query($request)
    {
        if (!empty($request)) {
            throw new Exception('exist');
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
        if (empty($request)) {
            throw new Exception('Datos no encontrados.');
        }
        return true;
    }

    /**
     * validate_vacio
     *
     * @param  mixed $colegiado_solicitado
     * @return void
     */
    public function validate_vacio(ObjColegiado $colegiado_solicitado)
    {
        $this->objeto_colegiado = $colegiado_solicitado;
        if (empty($this->objeto_colegiado->get_cod_federacion()) || empty($this->objeto_colegiado->get_id_persona())) {
            throw new Exception('Por favor revisar los campos existe uno Vacio' . $this->objeto_colegiado->get_cod_federacion() . ' ' . $this->objeto_colegiado->get_id_persona());
        }
        return true;
    }

    /**
     * validate_colegiado
     *
     * @param  mixed $request_user
     * @return void
     */
    public function validate_colegiado($request_user)
    {
        if ($request_user == 'exist') {
            throw new Exception('¡Atención! el colegiado ya existe, ingrese otro.');
        }
        return true;
    }

    /**
     * validate_update_colegiado
     *
     * @param  mixed $request_user
     * @return void
     */
    public function validate_update_colegiado($request_user)
    {
        if ($request_user <= 0) {
            throw new Exception('No es posible almacenar los datos. Error interno intente mas tarde');
        }
        return true;
    }

    /**
     * validate_delete_colegiado
     *
     * @param  mixed $request
     * @return void
     */
    public function validate_delete_colegiado($request)
    {
        if ($request != true) {
            throw new Exception('Error al eliminar el Colegiado.');
        }
        return true;
    }
}

// EOF
