<?php

require_once "Controllers/class-exceptiion-rol.php";
require_once "Librerias/Objetos/class-objeto-roles.php";

class RolesModel extends Mysql
{
    private $objRoles;

    public function __construct()
    {
        parent::__construct();
    }
    //Metodo para consultar todos los roles
    public function select_roles()
    {
        //creacion del query para solicitar los datos
        $sql = "SELECT * FROM rol WHERE status !=0";
        //Llamado al metodo select_all donde se ejecuta la consulta a la base de datos
        //en la clase Mysql
        $request = $this->select_all($sql);
        return $request;
    }

    //Metodo para consultar un rol
    public function select_rol(int $idRol)
    {

        //creacion del query para solicitar los datos
        $sql = "SELECT * FROM rol WHERE id_rol = '$idRol'";
        //Llamado al metodo select donde se ejecuta la consulta a la base de datos
        //en la clase Mysql
        return $this->select($sql);
    }
    //Metodo para insertar un rol individual
    public function insert_rol(ObjRoles $objRoles)
    {
        $this->objRoles = $objRoles;
        $return = "";
        //creacion del query para validar si el rol existe o no
        $sql = "SELECT * FROM rol WHERE nombre_rol = '{$this->objRoles->get_rol()}'";
        $request = $this->select_all($sql);
        //Si el rol no existe la variable request estara vacia
        if (empty($request)) {
            //Creacion del query para ingresar los datos
            $query_insert = "INSERT INTO rol(nombre_rol,descripcion_rol,status) VALUES (?,?,?)";
            //Asignacion de los datos al array para su ingreso
            $arrData = array($this->objRoles->get_rol(),
                $this->objRoles->get_descripcion(),
                $this->objRoles->get_status());
            //Llamado al metodo insert enviando el query y los datos
            $request_insert = $this->insert($query_insert, $arrData);
            //se regrese al valor obtenido por el insert
            $return = $request_insert;
        } else {
            //Enviar el mensaje exist para que s emuestre el mdoal de existe el rol
            $return = "exist";
        }
        return $return;
    }

    public function update_rol(ObjRoles $objRoles)
    {
        $this->objRoles = $objRoles;
        $sql = "SELECT * FROM rol WHERE nombre_rol = '{$this->objRoles->get_rol()}' AND id_rol != '{$this->objRoles->get_id_rol()}'";
        $request = $this->select_all($sql);
        if (empty($request)) {
            $sql = "UPDATE rol SET nombre_rol = ?, descripcion_rol = ?, status = ? WHERE id_rol = '{$this->objRoles->get_id_rol()}'";
            $arrData = array($this->objRoles->get_rol(),
                $this->objRoles->get_descripcion(),
                $this->objRoles->get_status());
            $request = $this->update($sql, $arrData);
        } else {
            $request = "exist";
        }
        return $request;
    }

    //Funcion para eliminar Roles
    public function delete_rol(int $id_rol)
    {
        $request = $this->validar_rol_del($id_rol);
        if (empty($request)) {
            $sql = "UPDATE rol SET status = ? WHERE id_rol = '$id_rol'";
            $arrData = array(0);
            $requestDel = $this->update($sql, $arrData);
            $request = $this->respuesta_del($requestDel);
        } else {
            $request = 'exist';
        }
        return $request;
    }

    public function respuesta_del($request)
    {
        if ($request) {
            $request = 'ok';
        } else {
            $request = 'error';
        }
        return $request;
    }

    public function validar_rol_del(int $id_rol)
    {
        $sql = "SELECT * FROM persona WHERE id_rol = '$id_rol'";
        return $this->select_all($sql);
    }
}

// EOF
