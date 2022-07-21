<?php

require_once "Controllers/class-exception-olegiados.php";
require_once "Librerias/Objetos/class-objeto-colegiado.php";

class ColegiadosModel extends Mysql
{
    private $objetoColegiado;
    private $valExcepcionesColegiados;
    public function __construct()
    {
        parent::__construct();
        $this->valExcepcionesColegiados = new ErrorsColegiados();
    }
    /*Funcion que recibe como parametro un Objeto tipo colegiado y procede a insertar un colegiado a la
    base de datos */
    public function insertColegiado(ObjColegiado $objetoColegiado)
    {
        try {
            $this->objetoColegiado = $objetoColegiado;
            $sql = "SELECT * FROM colegiado WHERE
					id_persona = '{$this->objColegiado->getIdPersona()}'";
            $request = $this->select_all($sql);
            $this->valExcepcionesColegiados->validar_query_insertar($request);
            $query_insert = "INSERT INTO colegiado(`id_persona`, `codigo_federacion`, `status`)
								  VALUES(?,?,?)";
            $arrData = array($this->objColegiado->get_id_persona(),
                $this->objColegiado->get_cod_federacion(),
                $this->objColegiado->get_status());
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } catch (Exception $e) {
            $return = $e->getMessage();
        }
        return $return;
    }

    /*Funcion que recibe como parametro un Objeto tipo colegiado y procede a actualizar un colegiado a la
    base de datos */
    public function update_colegiado(ObjColegiado $objetoColegiado)
    {
        $this->objColegiado = $objetoColegiado;
        $sql = "SELECT * FROM colegiado WHERE (id_persona = '{$this->objColegiado->get_id_persona()}' AND id_colegiado != '{$this->objColegiado->get_id_colegiado()}') ";
        $request = $this->select_all($sql);
        try {
            $this->valExcepcionesColegiados->validar_query_insertar($request);
            $sql = "UPDATE colegiado SET id_persona=?, codigo_federacion=?, status=?
							WHERE id_colegiado = '{$this->objColegiado->get_id_colegiado()}' ";
            $arrData = array($this->objColegiado->get_id_persona(),
                $this->objColegiado->get_cod_federacion(),
                $this->objColegiado->get_status());

            $request = $this->update($sql, $arrData);
        } catch (Exception $e) {
            $request = $e->getMessage();
        }
        return $request;
    }

    /*Funcion que selecciona todos los colegiados no recibe parametros */
    public function select_colegiados()
    {
        $sql = "SELECT c.id_colegiado, c.codigo_federacion, c.status, p.idpersona,p.cedula,p.nombres,p.apellidos,p.telefono,p.email_user
					FROM colegiado c
					INNER JOIN persona p
					ON c.id_persona = p.idpersona
					WHERE c.status != 0 ";
        return $this->select_all($sql);
    }
    /*Funcion que permite seleccionar un colegiado recibe como parametro el Id del colegiado a seleccionar */
    public function select_colegiado(int $idColegiado)
    {
        $intIdColegiado = $idColegiado;
        $sql = "SELECT c.id_colegiado, c.codigo_federacion, c.status, p.idpersona,p.cedula,p.nombres,p.apellidos,p.telefono,p.email_user,DATE_FORMAT(p.datecreated, '%d-%m-%Y') as fechaRegistro
					FROM colegiado c
					INNER JOIN persona p
					ON c.id_persona = p.idpersona
					WHERE c.id_colegiado = $intIdColegiado";
        return $this->select($sql);
    }

    /*Funcion que permite eliminar un colegiado recibiendo un ID*/
    public function delete_colegiado(int $idColegiado)
    {
        $this->idColegiado = $idColegiado;
        $sql = "DELETE from colegiado WHERE id_colegiado = $this->idColegiado";
        return $this->delete($sql);
    }

}

// EOF
