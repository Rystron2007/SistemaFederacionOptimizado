<?php

require_once "Controllers/class-exception-usuario.php";
require_once "Librerias/Objetos/class-objeto-persona.php";

class UsuariosModel extends Mysql
{
    private $objPersona;
    private $valExcepcionesUsuario;

    public function __construct()
    {
        parent::__construct();
        $this->valExcepcionesUsuario = new ErrorsUsuarios();
    }
    /*Funcion que recibe como parametro un Objeto tipo persona y procede a insertar una persona a la
    base de datos */
    public function insert_usuario(ObjPersona $objPersona)
    {
        try {
            $this->objPersona = $objPersona;
            $sql = "SELECT * FROM persona WHERE
					email_user = '{$this->objPersona->get_email()}' or cedula = '{$this->objPersona->get_cedula()}' ";
            $request = $this->select_all($sql);
            $this->valExcepcionesUsuario->validar_query_insertar($request);
            $query_insert = "INSERT INTO persona(cedula,nombres,apellidos,telefono,email_user,password,id_rol,status)
								  VALUES(?,?,?,?,?,?,?,?)";
            $arrData = array($this->objPersona->get_cedula(),
                $this->objPersona->get_nombre(),
                $this->objPersona->get_apellidos(),
                $this->objPersona->get_telefono(),
                $this->objPersona->get_email(),
                $this->objPersona->get_password(),
                $this->objPersona->get_tipo_id(),
                $this->objPersona->get_status());
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } catch (Exception $e) {
            $return = $e->getMessage();
        }
        return $return;
    }
    /*Funcion que recibe como parametro un Objeto tipo persona y procede a actualizar una persona a la
    base de datos */
    public function update_usuario(ObjPersona $objPersona)
    {
        $this->objPersona = $objPersona;
        $sql = "SELECT * FROM persona WHERE (email_user = '{$this->objPersona->get_email()}' AND idpersona != '{$this->objPersona->get_id_persona()}')
										  OR (cedula = '{$this->objPersona->get_cedula()}' AND idpersona != '{$this->objPersona->get_id_persona()}') ";
        $request = $this->select_all($sql);
        try {
            $this->valExcepcionesUsuario->validar_query_insertar($request);
            if (empty($this->objPersona->get_password())) {
                $sql = "UPDATE persona SET cedula=?, nombres=?, apellidos=?, telefono=?, email_user=?, password=?, id_rol=?, status=?
							WHERE idpersona = '{$this->objPersona->get_id_persona()}' ";
                $arrData = array($this->objPersona->get_cedula(),
                    $this->objPersona->get_nombre(),
                    $this->objPersona->get_apellidos(),
                    $this->objPersona->get_telefono(),
                    $this->objPersona->get_email(),
                    $this->objPersona->get_password(),
                    $this->objPersona->get_tipo_id(),
                    $this->objPersona->get_status());
            } else {
                $sql = "UPDATE persona SET cedula=?, nombres=?, apellidos=?, telefono=?, email_user=?, password=?, id_rol=?, status=?
							WHERE idpersona = '{$this->objPersona->get_id_persona()}' ";
                $arrData = array($this->objPersona->get_cedula(),
                    $this->objPersona->get_nombre(),
                    $this->objPersona->get_apellidos(),
                    $this->objPersona->get_telefono(),
                    $this->objPersona->get_email(),
                    $this->objPersona->get_password(),
                    $this->objPersona->get_tipo_id(),
                    $this->objPersona->get_status());
            }
            $request = $this->update($sql, $arrData);
        } catch (Exception $e) {
            $request = $e->getMessage();
        }
        return $request;
    }
    /*Funcion que selecciona todos los usuarios no recibe parametros */
    public function select_usuarios()
    {
        $sql = "SELECT p.idpersona,p.cedula,p.nombres,p.apellidos,p.telefono,p.email_user,p.status,r.nombre_rol
					FROM persona p
					INNER JOIN rol r
					ON p.id_rol = r.id_rol
					WHERE p.status != 0 ";
        return $this->select_all($sql);
    }
    /*Funcion que permite seleccionar un usuario recibe como parametro el Id del usuario a seleccionar */
    public function select_usuario(int $idpersona)
    {
        $sql = "SELECT p.idpersona,p.cedula,p.nombres,p.apellidos,p.telefono,p.email_user,r.id_rol,r.nombre_rol,p.status, DATE_FORMAT(p.datecreated, '%d-%m-%Y') as fechaRegistro
					FROM persona p
					INNER JOIN rol r
					ON p.id_rol = r.id_rol
					WHERE p.idpersona = '$idpersona'";
        return $this->select($sql);
    }
    /*Funcion que permite eliminar un usuario recibiendo un ID*/
    public function delete_usuario(int $intIdpersona)
    {
        $sql = "UPDATE persona SET status = ? WHERE idpersona = '$intIdpersona' ";
        $arrData = array(0);
        return $this->update($sql, $arrData);
    }

}

// EOF
