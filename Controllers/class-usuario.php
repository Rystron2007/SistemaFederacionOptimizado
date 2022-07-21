<?php

//Provee el control de excepciones para los Usuarios.
include_once "Controllers/class-exception-usuario.php";

//Provee la clase de Persona.
include_once "Librerias/Objetos/class-objeto-persona.php";

class Usuarios extends Controllers
{

    private $objPersona;
    private $excepcion_usuario;

    /**
     * __construct
     * Constructor por defecto
     * @return void
     */
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['login'])) {
            header('Location: ' . base_url() . '/login');
        }
        parent::__construct();
        $this->excepcion_usuario = new ErrorsUsuarios();
    }

    /**
     * usuarios
     * LLamado de la vista y los datos para usar en la vista
     * @return void
     */
    public function initialize_usuarios()
    {
        $data['page_id'] = 4;
        $data['page_tag'] = "Usuarios - Sistema Federacion de Arbritos";
        $data['page_title'] = "Administracion de Usuarios ";
        $data['page_name'] = "usuarios";
        $data['page_functions_js'] = "functions_usuarios.js";
        $this->views->getView($this, "usuarios", $data);
    }

    /**
     * set_datos
     * Funcion que inicializa los datos recibios por el metodo POST y se lo aplica a los datos de los objetos
     * @return void
     */
    public function set_datos()
    {
        $this->objeto_persona = new ObjPersona();
        $this->objeto_persona->set_id_persona(intval($_POST['idUsuario']));
        $this->objeto_persona->set_cedula(str_clean($_POST['txtIdentificacion']));
        $this->objeto_persona->set_nombre(ucwords(str_clean($_POST['txtNombre'])));
        $this->objeto_persona->set_apellidos(ucwords(str_clean($_POST['txtApellido'])));
        $this->objeto_persona->set_telefono(intval(str_clean($_POST['txtTelefono'])));
        $this->objeto_persona->set_email(strtolower(str_clean($_POST['txtEmail'])));
        $this->objeto_persona->set_tipo_id(intval(str_clean($_POST['listRolid'])));
        $this->objeto_persona->set_status(intval(str_clean($_POST['listStatus'])));
    }

    /**
     * set_usuario
     * Funcion que permite setear un usuario en el sistema
     * @return void
     */
    public function set_usuario()
    {
        if ($_POST) {
            try {
                $this->set_datos();
                $this->excepcion_usuario->validar_campos_vacios($this->objeto_persona);
                $this->objeto_persona->setPassword(empty($_POST['txtPassword']) ? hash("SHA256", pass_generador()) : hash("SHA256", $_POST['txtPassword']));
                $request_user = $this->model->insertUsuario($this->objeto_persona);
                $this->excepcion_usuario->validar_usuario_existente($request_user);
                $array_response = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            } catch (Exception $e) {
                $array_response = array("status" => false, "msg" => $e->getMessage());
            }
            echo json_encode($array_response, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    /**
     * update_usuario
     * Funcion que permite editar un usuario en el sistema
     * @return void
     */
    public function update_usuario()
    {
        if ($_POST) {
            try {
                $this->set_datos();
                $this->excepcion_usuario->validar_campos_vacios($this->objeto_persona);
                $this->objeto_persona->setPassword(empty($_POST['txtPassword']) ?: hash("SHA256", $_POST['txtPassword']));
                $request_user = $this->model->updateUsuario($this->objeto_persona);
                $this->excepcion_usuario->validar_usuario_actualizado($request_user);
                $array_response = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
            } catch (Exception $e) {
                $array_response = array("status" => false, "msg" => $e->getMessage());
            }
            echo json_encode($array_response, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    /**
     * get_usuario
     * Funcion que permite recuperar todos los usuarios del sistema
     * @return void
     */
    public function get_usuarios()
    {
        $array_data = $this->model->select_usuarios();
        for ($i = 0; $i < sizeof($array_data); $i++) {
            if ($array_data[$i]['status'] == 1) {
                $array_data[$i]['status'] = '<span class="badge badge-success" style="background: green">Activo</span>';
            } else {
                $array_data[$i]['status'] = '<span class="badge badge-danger" style="background: red">Inactivo</span>';
            }
            $array_data[$i]['options'] = '<div class="text-center">
				<button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewUsuario(' . $array_data[$i]['idpersona'] . ')" title="Ver usuario"><i class="far fa-eye"></i></button>
				<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="fntEditUsuario(' . $array_data[$i]['idpersona'] . ')" title="Editar usuario"><i class="fas fa-pencil-alt"></i></button>
				<button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelUsuario(' . $array_data[$i]['idpersona'] . ')" title="Eliminar usuario"><i class="far fa-trash-alt"></i></button>
				</div>';
        }
        echo json_encode($array_data, JSON_UNESCAPED_UNICODE);
        die();
    }

    /**
     * get_usuario
     * Funcion que permite seleccionar un usuario del sistema
     * @param  mixed $id_persona
     * @return void
     */
    public function get_usuario(int $id_persona)
    {
        $idusuario = intval($id_persona);
        if ($idusuario > RESPUESTA_QUERY) {
            $array_data = $this->model->select_usuario($idusuario);
            $this->excepcion_usuario->validar_query($array_data);
            try {
                $array_response = array('status' => true, 'data' => $array_data);
            } catch (Exception $e) {
                $array_response = array('status' => false, 'msg' => $e->getMessage());
            }
            //dep($array_response);
            echo json_encode($array_response, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    /**
     * delete_usuario
     * Funcion que permite eliminar un usuario en el sistema
     * @return void
     */
    public function delete_usuario()
    {
        if ($_POST) {
            $id_persona = intval($_POST['idUsuario']);
            $request_delete = $this->model->delete_usuario($id_persona);
            $this->excepcion_usuario->validar_query_delete($request_delete);
            try {
                $array_response = array('status' => true, 'msg' => 'Se ha eliminado el usuario');
            } catch (Exception $e) {
                $array_response = array('status' => false, 'msg' => $e->getMessage());
            }
            echo json_encode($array_response, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    /**
     * get_selected_usuarios
     * Funcion que permite recuperar la lista de usaurios para crear un colegio  la llamada de esta
     * funcion esta en el controlador colegiados
     * @return void
     */
    public function get_selected_usuarios()
    {
        $html_options = "";
        $array_data = $this->model->select_usuarios();
        if (count($array_data) > 0) {
            for ($i = 0; $i < count($array_data); $i++) {
                if ($array_data[$i]['status'] == 1) {
                    $html_options .= '<option value="' . $array_data[$i]['idpersona'] . '">' . $array_data[$i]['nombres'] . '</option>';
                }
            }
        }
        echo $html_options;
        die();
    }
}

// EOF
