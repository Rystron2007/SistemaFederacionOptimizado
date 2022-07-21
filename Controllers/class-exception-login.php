<?php

class Errors extends Controllers
{
    private $mensaje;
    private $request_user;

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
     * validarUsuarioExiste
     * Funcion que valida la existencia del usuario
     * @param  mixed $request_user
     * @return void
     */
    public function validar_usuario_existe($request_user)
    {
        if (empty($request_user)) {
            throw new Exception('El usuario o la contraseña es incorrecto.');
        }
        return true;
    }

    /**
     * validarCamposVacios
     * Validar campos Vacios
     * @param  mixed $user
     * @param  mixed $pass
     * @return void
     */
    public function validar_campos_vacios($user, $pass)
    {
        if (empty($user) || empty($pass)) {
            throw new Exception('Error de datos');
        }
        return true;
    }

    /**
     * validarStatus
     * Validar el estado de la respuesta
     * @param  mixed $arrData
     * @return void
     */
    public function validar_status($arrData)
    {
        if ($arrData['status'] != 1) {
            throw new Exception('Usuario inactivo');
        }
        return true;
    }

    /**
     * validarCampoEmail
     *
     * @param  mixed $user
     * @return void
     */
    public function validar_campo_email($user)
    {
        if (empty($user)) {
            throw new Exception('Escribir su correo Electronico para Reiniciar');
        }
        return true;
    }

    /**
     * validarVacio
     *
     * @param  mixed $arrData
     * @return void
     */
    public function validar_vacio($arrData)
    {
        if (empty($arrData)) {
            throw new Exception('Usuario no existente');
        }
        return true;
    }

    /**
     * validarRespuestaUpdate
     *
     * @param  mixed $requestUpdate
     * @return void
     */
    public function validar_respuesta_update($requestUpdate)
    {
        if ($requestUpdate == false) {
            throw new Exception('No es posible realizar el proceso, intenta más tarde.');
        }return true;
    }

    /**
     * validarVacioConfirm
     *
     * @param  mixed $params
     * @return void
     */
    public function validar_vacio_confirm($params)
    {
        if (empty($params)) {
            throw new Exception('parametros');
        }
        return true;
    }

    /**
     * validarCamposReset
     *
     * @param  mixed $id
     * @param  mixed $email
     * @param  mixed $token
     * @param  mixed $pass
     * @param  mixed $confirPass
     * @return void
     */
    public function validar_campos_reset($id, $email, $token, $pass, $confirPass)
    {
        if (empty($id) || empty($email) || empty($token) || empty($pass) || empty($confirPass)) {
            throw new Exception('Error datos Vacios');
        }
        return true;
    }

    /**
     * validarPassIguales
     *
     * @param  mixed $password
     * @param  mixed $passwordConfirm
     * @return void
     */
    public function validar_pass_iguales($password, $passwordConfirm)
    {
        if ($password != $passwordConfirm) {
            throw new Exception('Las contraseñas no son iguales.');
        }
        return true;
    }

    /**
     * validarRespuestaReset
     *
     * @param  mixed $arrResponseUser
     * @return void
     */
    public function validar_respuesta_reset($arrResponseUser)
    {
        if (empty($arrResponseUser)) {
            throw new Exception('Error de datos.');
        }
    }

    /**
     * validarProcesoReset
     *
     * @param  mixed $requestPass
     * @return void
     */
    public function validar_proceso_reset($requestPass)
    {
        if ($requestPass == false) {
            throw new Exception('No es posible realizar el proceso, intente más tarde.');
        }
    }
}

// EOF
