<?php

//Provee de control de excepciones para los Colegiados.
include_once "Controllers/class-exception-colegiados.php";

//Provee la clase de Colegiado.
include_once "Librerias/Objetos/class-objeto-colegiado.php";

class Colegiados extends Controllers implements Crud
{
    private $objeto_colegiado;
    private $excepcion_colegiado;

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
        $this->excepcion_colegiado = new ErrorsColegiados();
    }

    /**
     * initilize_colegiados
     * LLamado de la vista y los datos para usar en la vista
     * @return void
     */
    public function initilize_colegiados()
    {
        $data['page_id'] = 10;
        $data['page_tag'] = "Colegiados - Sistema Federacion de Arbritos";
        $data['page_title'] = "Administracion de Colegiados ";
        $data['page_name'] = "colegiados";
        $data['page_functions_js'] = "functions_colegiados.js";
        $this->views->getView($this, "colegiados", $data);
    }

    /**
     * asignar_datos
     * Funcion que inicializa los datos recibios por el metodo POST y se lo aplica a los datos de los objetos
     * @return void
     */
    public function asignar_datos()
    {
        $this->objeto_colegiado = new ObjColegiado();
        $this->objeto_colegiado->set_id_colegiado(intval($_POST['idColegiado']));
        $this->objeto_colegiado->set_id_persona(intval($_POST['listUsuarios']));
        $this->objeto_colegiado->set_cod_federacion(str_clean($_POST['txtFederacion']));
        $this->objeto_colegiado->set_status(intval(str_clean($_POST['listStatus'])));
    }

    /**
     * get_individual
     * Funcion que permite seleccionar un colegiado del sistema
     * @param  mixed $id
     * @return void
     */
    public function get_individual(int $id)
    {
        $idColegiado = intval($id);
        if ($idColegiado > RESPUESTA_QUERY) {
            $array_data = $this->model->selectColegiado($idColegiado);
            try {
                $this->excepcion_colegiado->validar_query($array_data);

                $array_response = array('status' => true, 'data' => $array_data);
            } catch (Exception $e) {
                $array_response = array('status' => false, 'msg' => $e->getMessage());
            }
            echo json_encode($array_response, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    /**
     * get_all
     * Funcion que permite recuperar todos los colegiados del sistema
     * @return void
     */
    public function get_all()
    {
        $array_data = $this->model->select_colegiados();

        for ($i = 0; $i < sizeof($array_data); $i++) {
            if ($array_data[$i]['status'] == 1) {
                $array_data[$i]['status'] = '<span class="badge badge-success" style="background: green">Activo</span>';
            } else {
                $array_data[$i]['status'] = '<span class="badge badge-danger" style="background: red">Inactivo</span>';
            }
            $array_data[$i]['options'] = '<div class="text-center">
				<button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewColegiado(' . $array_data[$i]['id_colegiado'] . ')" title="Ver Colegiado"><i class="far fa-eye"></i></button>
				<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="fntEditColegiado(' . $array_data[$i]['id_colegiado'] . ')" title="Editar Colegiado"><i class="fas fa-pencil-alt"></i></button>
				<button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelColegiado(' . $array_data[$i]['id_colegiado'] . ')" title="Eliminar Colegiado"><i class="far fa-trash-alt"></i></button>
				</div>';
        }

        echo json_encode($array_data, JSON_UNESCAPED_UNICODE);
        die();
    }

    /**
     * set_registro
     * Funcion que permite setear un colegiado en el sistema
     * @return void
     */
    public function set_registro()
    {
        if ($_POST) {
            try {
                $this->asignar_datos();
                $this->excepcion_colegiado->validar_campos_vacios($this->objeto_colegiado);
                $request_colegiado = $this->model->insert_colegiado($this->objeto_colegiado);
                $this->excepcion_colegiado->validar_colegiado_existente($request_colegiado);
                $array_response = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            } catch (Exception $e) {
                $array_response = array("status" => false, "msg" => $e->getMessage());
                //$array_response = array("status" => false, "msg" => $this->objeto_colegiado->getIdPersona());
            }
            echo json_encode($array_response, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    /**
     * update_registro
     * Funcion que permite editar un colegiado en el sistema
     * @return void
     */
    public function update_registro()
    {
        if ($_POST) {
            try {
                $this->asignar_datos();
                $this->excepcion_colegiado->validar_campos_vacios($this->objeto_colegiado);
                $request_colegiado = $this->model->update_colegiado($this->objeto_colegiado);
                $this->excepcion_colegiado->validar_colegiado_actualizado($request_colegiado);
                $array_response = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
            } catch (Exception $e) {
                $array_response = array("status" => false, "msg" => $e->getMessage());
            }
            echo json_encode($array_response, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    /**
     * delete_registro
     * Funcion que permite eliminar un colegiado en el sistema
     * @return void
     */
    public function delete_registro()
    {
        if ($_POST) {
            $intIdColegiado = intval($_POST['id_colegiado']);

            $requestDelete = $this->model->delete_colegiado($intIdColegiado);
            try {
                $this->excepcion_colegiado->validar_query_delete($requestDelete);

                $array_response = array('status' => true, 'msg' => 'Datos Eliminados correctamente.');

            } catch (Exception $e) {
                $array_response = array('status' => false, 'msg' => $e->getMessage());

            }
            echo json_encode($array_response, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}

// EOF
