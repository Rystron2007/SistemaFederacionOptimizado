<?php

class Permisos extends Controllers
{
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
     * get_permiso_rol
     * Funcion que recupera los permisol que tiene el usuairo
     * @param  mixed $id_rol
     * @return void
     */
    public function get_permiso_rol(int $id_rol)
    {
        $rol_id = intval($id_rol);
        if ($rol_id > 0) {
            $array_modulos = $this->model->selectModulos();
            $array_permiso_rol = $this->model->select_permisos_rol($rol_id);
            $array_permiso = array('read' => 0, 'write' => 0, 'update' => 0, 'delete' => 0);
            $array_permiso_rol_nuevo = array('id_rol' => $rol_id);
            if (empty($array_permiso_rol)) {
                for ($i = 0; $i < count($array_modulos); $i++) {
                    $array_modulos[$i]['permisos'] = $array_permiso;
                }
            } else {
                for ($i = 0; $i < count($array_modulos); $i++) {
                    $array_permiso = array('read' => $array_permiso_rol[$i]['read_permiso'],
                        'write' => $array_permiso_rol[$i]['write_permiso'],
                        'update' => $array_permiso_rol[$i]['update_permiso'],
                        'delete' => $array_permiso_rol[$i]['delete_permiso'],
                    );
                    if ($array_modulos[$i]['id_modulo'] == $array_permiso_rol_nuevo[$i]['id_modulo']) {
                        $array_modulos[$i]['permisos'] = $array_permiso;
                    }
                }
            }
            $array_permiso_rol_nuevo['modulos'] = $array_modulos;
            $html = get_modal("modalPermisos", $array_permiso_rol_nuevo);
        }
        die();
    }
    /**
     * set_permiso
     * Funcion para setear los permisos al usuario
     * @return void
     */
    public function set_permiso()
    {
        if ($_POST) {
            $id_rol = intval($_POST['id_rol']);
            $modulos = $_POST['modulos'];
            $this->model->delete_permisos($id_rol);
            foreach ($modulos as $modulo) {
                $id_modulo = $modulo['id_modulo'];
                $read = empty($modulo['read']) ? 0 : 1;
                $write = empty($modulo['write']) ? 0 : 1;
                $update = empty($modulo['update']) ? 0 : 1;
                $delete = empty($modulo['delete']) ? 0 : 1;
                $request_permiso = $this->model->insert_permisos($id_rol, $id_modulo, $read, $write, $update, $delete);
            }
            if ($request_permiso > 0) {
                $array_response = array('status' => true, 'msg' => 'Permisos Guardados Correctamente');
            } else {
                $array_response = array('status' => false, 'msg' => 'No es posible asignar los permisos');
            }
            echo json_encode($array_response, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}

// EOF
