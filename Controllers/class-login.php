<?php

//Provee el control de excepciones para el Login.
include_once "Controllers/ExcepcionesLogin.php";

class Login extends Controllers
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        session_start();
        if (isset($_SESSION['login'])) {
            header('Location: ' . base_url() . 'dashboard');
        }
        parent::__construct();
    }

    /**
     * login
     *
     * @return void
     */
    public function initilize_login()
    {
        $data['page_tag'] = "Login - Federación Arbritos";
        $data['page_title'] = "Federación de Arbritos";
        $data['page_name'] = "login";
        $data['page_functions_js'] = "functions_login.js";
        $this->views->getView($this, "login", $data);
    }

    /**
     * login_user
     * Funcion que permite realizar el login a un usuario validando el usuario y el password
     * @return void
     */
    public function login_user()
    {
        $validarExcepcionesLogin = new Errors();
        if ($_POST) {
            try {
                $validarExcepcionesLogin->validar_campos_vacios($_POST['txtEmail'], $_POST['txtPassword']);
                $strUsuario = strtolower(str_clean($_POST['txtEmail']));
                $strPassword = hash("SHA256", $_POST['txtPassword']);
                $requestUser = $this->model->login_user($strUsuario, $strPassword);
                $validarExcepcionesLogin->validar_usuario_existe($requestUser);
                $arrData = $requestUser;
                $validarExcepcionesLogin->validar_status($arrData);
                $_SESSION['idUser'] = $arrData['idpersona'];
                $_SESSION['login'] = true;
                $arrData = $this->model->sessionLogin($_SESSION['idUser']);
                $_SESSION['userData'] = $arrData;
                //sessionUser($_SESSION['idUser']);
                $arrResponse = array('status' => true, 'msg' => 'ok');
            } catch (Exception $e) {
                $arrResponse = array('status' => false, 'msg' => $e->getMessage());
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    /**
     * reset_password
     * Funcion para resetear password
     * @return void
     */
    public function reset_password()
    {
        $validarExcepcionesLogin = new Errors();
        if ($_POST) {
            error_reporting(0);
            try {
                $validarExcepcionesLogin->validar_campo_email($_POST['txtEmailReset']);
                $token = token();
                $strEmail = strtolower(str_clean($_POST['txtEmailReset']));
                $arrData = $this->model->getUserEmail($strEmail);
                $validarExcepcionesLogin->validar_vacio($arrData);
                $idpersona = $arrData['idpersona'];
                $nombreUsuario = $arrData['nombres'] . ' ' . $arrData['apellidos'];
                $url_recovery = base_url() . 'login/confirm_password/' . $strEmail . '/' . $token;

                $requestUpdate = $this->model->setTokenUser($idpersona, $token);

                $dataUsuario = array('nombreUsuario' => $nombreUsuario,
                    'email' => $strEmail,
                    'asunto' => 'Recuperar cuenta - ' . NOMBRE_REMITENTE,
                    'url_recovery' => $url_recovery);
                $validarExcepcionesLogin->validar_respuesta_update($requestUpdate);
                $sendEmail = send_email($dataUsuario, 'email_cambioPassword');
                $validarExcepcionesLogin->validar_respuesta_update($sendEmail);

                $arrResponse = array('status' => true,
                    'msg' => 'Se ha enviado un email a tu cuenta de correo para cambiar tu contraseña.');

            } catch (Exception $e) {
                $arrResponse = array('status' => false, 'msg' => $e->getMessage());
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    /**
     * confirm_password
     * Funcion para confirmar el cambio de contraseña
     * @param  mixed $params
     * @return void
     */
    public function confirm_password(string $params)
    {
        $validarExcepcionesLogin = new Errors();
        try {
            $validarExcepcionesLogin->validar_vacio_confirm($params);
            $arrParams = explode(',', $params);
            $strEmail = str_clean($arrParams[0]);
            $strToken = str_clean($arrParams[1]);
            $arrResponse = $this->model->getUsuario($strEmail, $strToken);
            $validarExcepcionesLogin->validar_vacio_confirm($arrResponse);

            $data['page_tag'] = "Cambiar contraseña";
            $data['page_name'] = "cambiar_contrasenia";
            $data['page_title'] = "Cambiar Contraseña";
            $data['email'] = $strEmail;
            $data['token'] = $strToken;
            $data['idpersona'] = $arrResponse['idpersona'];
            $data['page_functions_js'] = "functions_login.js";
            $this->views->getView($this, "cambiarPass", $data);

        } catch (Exception $e) {
            header('Location: ' . base_url());
        }
        die();
    }

    /**
     * set_password
     * Funcion para ccambio de contraseña
     * @return void
     */
    public function set_password()
    {

        $validarExcepcionesLogin = new Errors();
        try {
            $intIdpersona = intval($_POST['idUsuario']);
            $strPassword = $_POST['txtPassword'];
            $strPasswordConfirm = $_POST['txtPasswordConfirm'];
            $strEmail = str_clean($_POST['txtEmail']);
            $strToken = str_clean($_POST['txtToken']);
            //Validaciones de campos
            $validarExcepcionesLogin->validar_campos_reset($intIdpersona, $strEmail, $strToken, $strPassword, $strPasswordConfirm);
            $validarExcepcionesLogin->validar_pass_iguales($strPassword, $strPasswordConfirm);

            $arrResponseUser = $this->model->get_usuario($strEmail, $strToken);
            //Validaciones de respuestas
            $validarExcepcionesLogin->validar_respuesta_reset($arrResponseUser);
            $strPassword = hash("SHA256", $strPassword);
            $requestPass = $this->model->insertPassword($intIdpersona, $strPassword);
            //Validaciones de procesos
            $validarExcepcionesLogin->validar_proceso_reset($requestPass);
            $arrResponse = array('status' => true, 'msg' => 'Contraseña actualizada con éxito.');
        } catch (Exception $e) {
            $arrResponse = array('status' => false, 'msg' => $e->getMessage());
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
}

// EOF
