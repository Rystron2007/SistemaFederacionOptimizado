<?php

//Provee el control de excepciones para los roles.
include_once "Controllers/class-exception-rol.php";

//Provee la clase de Rol.
include_once "Librerias/Objetos/class-objeto-roles.php";

class Roles extends Controllers implements Crud
{
    private $excepcion_rol;
    private $objeto_roles;

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
        $this->excepcion_rol = new ErrorsRoles();
    }

    /**
     * initilize_roles
     * Controlador para crear la vista
     * @return void
     */
    public function initilize_roles()
    {
        $data['page_id'] = 3;
        $data['page_tag'] = "Roles de Usuario";
        $data['page_name'] = "roles";
        $data['page_title'] = " Roles Usuario <small> Federación </small>";
        $data['page_functions_js'] = "functions_roles.js";
        $this->views->getView($this, "roles", $data);
    }

    /**
     * set_datos
     *
     * @return void
     */
    public function set_datos()
    {
        $this->objeto_roles = new ObjRoles();
        $this->objeto_roles->set_id_rol(intval($_POST['id_rol']));
        $this->objeto_roles->set_rol(str_clean($_POST['txtNombre']));
        $this->objeto_roles->set_descripcion(str_clean($_POST['txtDescripcion']));
        $this->objeto_roles->set_status(intval($_POST['listStatus']));

    }

    /**
     * add_acciones
     *  Funcion para agregar los botones a la tabla
     * @param  mixed $arrData
     * @return void
     */
    public function add_acciones($arrData)
    {
        for ($i = 0; $i < count($arrData); $i++) {
            //Validacion del estado del registro para mostrar el nombre en la tabla
            $arrData = $this->change_etiqueta($i, $arrData);
            //Accion para agregar los botones de accion a los registros de la tabla para poder ser utilizados.
            $arrData[$i]['options'] = '<div class="text-center">
            <button class="btn btn-secondary btn-sm btnPermisosRol" onClick="fntPermiso(' . $arrData[$i]['id_rol'] . ')" title="Permisos"><i class="fas fa-key"></i></button>
            <button class="btn btn-primary btn-sm btnEditRol" onClick="fntEditRol(' . $arrData[$i]['id_rol'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>
            <button class="btn btn-danger btn-sm btnDelRol" onClick="fntDelRol(' . $arrData[$i]['id_rol'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>
            </div>';
        }
        return $arrData;
    }

    /**
     * get_individual
     * Funcion para Consultar un Rol Unico
     * @param  mixed $id_rol
     * @return void
     */
    public function get_individual(int $id_rol)
    {
        //Convertimos lo que se recibe en un entero y se limpia
        $intIdRol = intval((str_clean($id_rol)));
        try {
            //Se arma un arreglo para recibir los datos del rol
            $arrData = $this->model->selectRol($intIdRol);
            $this->excepcion_rol->validar_query($arrData);
            //Se llama a la funcion para que agregue la respuesta
            $array_response = array('status' => true, 'data' => $arrData);
        } catch (Exception $e) {
            $array_response = array('status' => true, 'msg' => $e->getMessage());
        }
        echo json_encode($array_response, JSON_UNESCAPED_UNICODE);
        die();
    }

    /**
     * get_all
     * Funcion para Consultar todos los ROLES
     * @return void
     */
    public function get_all()
    {
        //Asignacion del los datos obtenidos
        $arrData = $this->model->select_roles();
        //Recorrido del array de datos recibidos de la base de datos.
        $arrData = $this->add_acciones($arrData);
        //Impresion de los datos en formato JSON y mostrar en la tabla
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    /**
     * get_selected_rol
     *
     * @return void
     */
    public function get_selected_rol()
    {
        $htmlOptions = "";
        $arrData = $this->model->select_roles();
        if (count($arrData) > 0) {
            for ($i = 0; $i < count($arrData); $i++) {
                if ($arrData[$i]['status'] == 1) {
                    $htmlOptions .= '<option value="' . $arrData[$i]['id_rol'] . '">' . $arrData[$i]['nombre_rol'] . '</option>';
                }
            }
        }
        echo $htmlOptions;
        die();
    }

    /**
     * set_registro
     * Funcion para Agregar un nuevo RoL
     * @return void
     */
    public function set_registro()
    {

        if ($_POST) {
            try {
                $this->set_datos();
                $this->excepcion_rol->validar_campos_vacios($this->objeto_roles);
                $request_rol = $this->model->insertRol($this->objeto_roles);
                $this->excepcion_rol->validar_rol_existente($request_rol);
                $array_response = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            } catch (Exception $e) {
                $array_response = array("status" => false, "msg" => $e->getMessage());
            }
        }
        echo json_encode($array_response, JSON_UNESCAPED_UNICODE);
        die();
    }

    /**
     * update_registro
     * Funcion para editar un Rol
     * @return void
     */
    public function update_registro()
    {

        if ($_POST) {
            try {
                $this->set_datos();
                $this->excepcion_rol->validar_campos_vacios($this->objeto_roles);
                $request_rol = $this->model->update_rol($this->objeto_roles);
                $this->excepcion_rol->validar_rol_actualizado($request_rol);
                $array_response = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
            } catch (Exception $e) {
                $array_response = array("status" => false, "msg" => $e->getMessage());
            }

            echo json_encode($array_response, JSON_UNESCAPED_UNICODE);
            die();
        }
    }

    /**
     * delete_registro
     * Funcion para Eliminar un ROL
     * @return void
     */
    public function delete_registro()
    {
        if ($_POST) {
            $intId_Rol = intval($_POST['id_rol']);
            $request_Delete = $this->model->deleteRol($intId_Rol);
            $array_response = $this->array_respuesta($request_Delete);
            echo json_encode($array_response, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    /**
     * send_respuesta
     * Funcion de Respuestas a las operacione de Insertar y Actualizar
     * @param  mixed $request_rol
     * @param  mixed $tipoOperacion
     * @return void
     */
    public function send_respuesta($request_rol, $tipoOperacion)
    {
        if ($request_rol > RESPUESTA_QUERY) {
            //mensaje si la respuesta es positiva
            $array_response = $this->validate_ingreso($tipoOperacion);

        } else if ($request_rol == RESPUESTA_QUERY_EXISTE) {
            //Mensaje si el rol es igual a otro
            $array_response = array('status' => false, 'msg' => '¡Atención el Rol ya Existe!');
        } else {
            //Mensaje de fallo
            $array_response = array('status' => true, 'msg' => 'No es Posible Almcenar los Datos');
        }
        return $array_response;
    }

    /**
     * validate_ingreso
     *
     * @param  mixed $tipoOperacion
     * @return void
     */
    public function validate_ingreso($tipoOperacion)
    {
        if ($tipoOperacion == RESPUESTA_QUERY) {
            $array_response = array('status' => true, 'msg' => 'Datos Guardados Correctamente');
        } else {
            $array_response = array('status' => true, 'msg' => 'Datos Actualizados Correctamente');
        }
        return $array_response;
    }

    /**
     * change_etiqueta
     * Funcion para cambiar el valor de Status por un mensaje
     * @param  mixed $i
     * @param  mixed $arrData
     * @return void
     */
    public function change_etiqueta($i, $arrData)
    {
        if ($arrData[$i]['status'] == 1) {
            $arrData[$i]['status'] = '<span class="badge badge-success" style="background: green">Activo</span>';
        } else {
            $arrData[$i]['status'] = '<span class="badge badge-danger" style="background: red">Inactivo</span>';
        }
        return $arrData;
    }

    /**
     * add_respuesta
     * Funcion para la respuesta del query de consulta general
     * @param  mixed $arrData
     * @return void
     */
    public function add_respuesta($arrData)
    {
        if (empty($arrData)) {
            $array_response = array('status' => false, 'msg' => 'Datos no Encontrados.');
        } else {
            $array_response = array('status' => true, 'data' => $arrData);
        }
        return $array_response;
    }

    /**
     * array_respuesta
     * Funcion para la respuesta de esta1do de Eliminacion
     * @param  mixed $request_Delete
     * @return void
     */
    public function array_respuesta($request_Delete)
    {
        if ($request_Delete == RESPUESTA_QUERY_OK) {
            $array_response = array('status' => true, 'msg' => 'Se ha Eliminado el ROL.');
        } else if ($request_Delete == RESPUESTA_QUERY_EXISTE) {
            $array_response = array('status' => false, 'msg' => 'No es posible eliminar un Rol Asociado a Usuarios.');
        } else {
            $array_response = array('status' => false, 'msg' => 'Error al Eliminar el Rol.');
        }
        return $array_response;
    }
}

// EOF
