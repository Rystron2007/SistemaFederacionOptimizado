<?php

//Provee la clase de Persona.
include_once "Librerias/Objetos/ObjPersona.php";

class ErrorsUsuarios extends Controllers
{
    private $objeto_persona;
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
     * notFound
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
     * validarCamposVacios
     * Funcion que valida los campos de usuario
     * @param  mixed $persona_solicitada
     * @return void
     */
    public function validar_campos_vacios(ObjPersona $persona_solicitada)
    {
        $this->objeto_persona = $persona_solicitada;
        if (empty($this->objeto_persona->getCedula()) || empty($this->objeto_persona->getNombre()) || empty($this->objeto_persona->getApellidos())) {
            throw new Exception('Por favor revisar los campos existe uno Vacio');
        }
        return true;
    }

    /**
     * validarUsuarioExistente
     *
     * @param  mixed $request_user
     * @return void
     */
    public function validar_usuario_existente($request_user)
    {
        if ($request_user == 'exist') {
            throw new Exception('¡Atención! el email o la identificación ya existe, ingrese otro.');
        }
        return true;
    }

    /**
     * validarUsuarioAgregado
     *
     * @param  mixed $request_user
     * @return void
     */
    public function validar_usuario_agregado($request_user)
    {
        if ($request_user == 0) {
            throw new Exception('No es posible almacenar los datos. Error interno intente mas tarde');
        }
        return true;
    }

    /**
     * validarUsuarioActualizado
     *
     * @param  mixed $request_user
     * @return void
     */
    public function validar_usuario_actualizado($request_user)
    {
        if ($request_user <= 0) {
            throw new Exception('No es posible almacenar los datos. Error interno intente mas tarde');
        }
        return true;
    }

    /**
     * validarQueryInsertar
     *
     * @param  mixed $request_user
     * @return void
     */
    public function validar_query_insertar($request_user)
    {
        if (!empty($request_user)) {
            throw new Exception('exist');
        }
        return true;
    }

    /**
     * validarQuery
     *
     * @param  mixed $request_user
     * @return void
     */
    public function validar_query($request_user)
    {
        if (empty($request_user)) {
            throw new Exception('Datos no encontrados.');
        }
        return true;
    }

    /**
     * validarQueryDelete
     *
     * @param  mixed $request_user
     * @return void
     */
    public function validar_query_delete($request_user)
    {
        if ($request_user != true) {
            throw new Exception('Error al eliminar el usuario.');
        }
        return true;
    }

}

// EOF
