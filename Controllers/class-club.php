<?php

//Provee de control de excepciones para los Clubes.
include_once "Controllers/ExcepcionesClub.php";

//Provee la clase de Club.
include_once "Librerias/Objetos/ObjClub.php";

class Club extends Controllers implements Crud
{
    private $objeto_club;
    private $excepcion_club;

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
        $this->excepcion_club = new ErrorsClub();
    }

    /**
     * initilize_club
     * Asignación de Información
     * @return void
     */
    public function initilize_club()
    {
        $data['page_id'] = 13;
        $data['page_tag'] = "Club - Sistema Federacion de Arbritos";
        $data['page_title'] = "Administracion de Clubes Asociados ";
        $data['page_name'] = "club";
        $data['page_functions_js'] = "functions_club.js";
        $this->views->getView($this, "club", $data);
    }

    /**
     * asignarDatos
     * Funcion que inicializa los datos recibios por el metodo POST y se lo aplica a los datos de los objetos
     * @return void
     */
    public function asignar_datos()
    {

        $this->objeto_club = new ObjClub();
        $this->objeto_club->set_id_club(intval($_POST['idClub']));
        $this->objeto_club->set_codigo_club(str_clean($_POST['txtCodigoClub']));
        $this->objeto_club->set_nombre_club(str_clean($_POST['txtNombre']));
        $this->objeto_club->set_correo_club(str_clean($_POST['txtEmail']));
        $this->objeto_club->set_asociacion_futbol(str_clean($_POST['txtFederacion']));
        $this->objeto_club->set_direccion_club(str_clean($_POST['txtDireccion']));
        $this->objeto_club->set_fecha_fundacion($_POST['selectDate']);
        $this->objeto_club->set_presidente(str_clean($_POST['txtPresidente']));
        $this->objeto_club->set_status(intval($_POST['listStatus']));
    }

    /**
     * getIndividual
     * Funcion que permite seleccionar un club del sistema
     * @param  mixed $id
     * @return void
     */
    public function get_individual(int $id)
    {
        $id_club = intval($id);
        if ($id_club > RESPUESTA_QUERY) {
            $arrData = $this->model->select_club($id_club);
            try {
                $this->excepcion_club->validar_query($arrData);
                $array_response = array('status' => true, 'data' => $arrData);
            } catch (Exception $e) {
                $array_response = array('status' => false, 'msg' => $e->getMessage());
            }
            echo json_encode($array_response, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    /**
     * getAll
     * Funcion que permite recuperar todos los clubes del sistema
     * @return void
     */
    public function get_all()
    {
        $arrData = $this->model->select_clubs();
        for ($i = 0; $i < sizeof($arrData); $i++) {
            if ($arrData[$i]['status'] == 1) {
                $arrData[$i]['status'] = '<span class="badge badge-success" style="background: green;">Activo</span>';
            } else {
                $arrData[$i]['status'] = '<span class="badge badge-danger" style="background: red;">Inactivo</span>';
            }
            $arrData[$i]['options'] = '<div class="text-center">
				<button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewClub(' . $arrData[$i]['id_club'] . ')" title="Ver Club"><i class="far fa-eye"></i></button>
				<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="fntEditClub(' . $arrData[$i]['id_club'] . ')" title="Editar Club"><i class="fas fa-pencil-alt"></i></button>
				<button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelClub(' . $arrData[$i]['id_club'] . ')" title="Eliminar Club"><i class="far fa-trash-alt"></i></button>
				</div>';
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    /**
     * setRegistro
     * Funcion que permite setear un club en el sistema
     * @return void
     */
    public function set_registro()
    {
        if ($_POST) {
            try {
                $this->asignar_datos();
                $this->excepcion_club->validar_campos_vacios($this->objeto_club);
                $request_club = $this->model->insert_club($this->objeto_club);
                $this->excepcion_club->validar_club_existente($request_club);
                $array_response = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            } catch (Exception $e) {
                $array_response = array("status" => false, "msg" => $e->getMessage());
            }
            echo json_encode($array_response, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    /**
     * update_registro
     * Funcion que permite editar un club en el sistema
     * @return void
     */
    public function update_registro()
    {
        if ($_POST) {
            try {
                $this->asignar_datos();
                $this->excepcion_club->validar_campos_vacios($this->objeto_club);
                $request_club = $this->model->update_colegiado($this->objeto_club);
                $this->excepcion_club->validar_club_actualizado($request_club);
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
     * Funcion que permite eliminar un club en el sistema
     * @return void
     */
    public function delete_registro()
    {
        if ($_POST) {
            $id_club = intval($_POST['idClub']);

            $requestDelete = $this->model->delete_club($id_club);
            try {
                $this->excepcion_club->validar_query_delete($requestDelete);

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
