<?php

//Provee la clase de Roles.
include_once "Librerias/Objetos/ObjRoles.php";

class ErrorsRoles extends Controllers
{
    private $objeto_roles;
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
     * validarCamposVacios
     *
     * @param  mixed $rol_solicitado
     * @return void
     */
    public function validar_campos_vacios(ObjRoles $rol_solicitado)
    {
        $this->objeto_roles = $rol_solicitado;
        if (empty($this->objeto_roles->getRol()) || empty($this->objeto_roles->getDescripcion())) {
            throw new Exception('Por favor revisar los campos existe uno Vacio');
        }
        return true;
    }

    /**
     * validarRolExistente
     *
     * @param  mixed $request_user
     * @return void
     */
    public function validar_rol_existente($request_user)
    {
        if ($request_user == 'exist') {
            throw new Exception('¡Atención! el Rol ya existe, ingrese otro.');
        }
        return true;
    }

    /**
     * validarRolActualizado
     *
     * @param  mixed $request_user
     * @return void
     */
    public function validar_rol_actualizado($request_user)
    {
        if ($request_user <= 0) {
            throw new Exception('No es posible almacenar los datos. Error interno intente mas tarde');
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
            throw new Exception('Error al eliminar el Colegiado.');
        }
        return true;
    }
}

// EOF
