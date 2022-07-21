<?php

require_once "Controllers/exception-club.php";
require_once "Librerias/Objetos/objeto-club.php";

class ClubModel extends Mysql
{
    private $objClub;
    private $valExcepcionesClub;

    public function __construct()
    {
        parent::__construct();
        $this->valExcepcionesClub = new ErrorsClub();
    }
    /*Funcion: Permite seleccionar un club, recive:
     *@param int $id_club
     */
    public function select_club(int $idClub)
    {
        $idClub = $idClub;
        $sql = "SELECT *
                FROM `club` WHERE id_club = $idClub";
        $request = $this->select($sql);
        return $request;
    }
    /*Funcion: Selecciona todos los clubes
     *No recibe parametros */
    public function select_clubs()
    {

        /*Llamado al metodo select_all donde se ejecuta la consulta a la base de datos
        en la clase Mysql*/
        $request = $this->select_all("SELECT * FROM club WHERE status !=0");
        return $request;
    }
    /*Funcion: Recibe como parametro un Objeto tipo club y procede a insertar un club a la
    base de datos */
    public function insert_club(ObjClub $objClub)
    {
        try {
            //Se asigna al objetio club de la clase el club recibido
            $this->objClub = $objClub;
            $sql = "SELECT * FROM club WHERE
					codigo_club = '{$this->objClub->get_codigo_club()}'";
            $request = $this->select_all($sql);
            $this->valExcepcionesClub->validar_query_insertar($request);
            $query_insert = "INSERT INTO club(`codigo_club`, `nombre_club`, `correo_club`,
                                                `asociacion_futbol`, `direccion_club`,
                                                `fecha_fundacion`, `presidente`, `status`)
								  VALUES(?,?,?,?,?,?,?,?)";
            //Ingreso de los datos obtenidos a un arreglo de datos
            $arrData = array($this->objClub->get_codigo_club(),
                $this->objClub->get_nombre_club(),
                $this->objClub->get_correo_club(),
                $this->objClub->get_asociacion_futbol(),
                $this->objClub->get_direccion_club(),
                $this->objClub->get_fecha_fundacion(),
                $this->objClub->get_presidente(),
                $this->objClub->get_status());
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } catch (Exception $e) {
            $return = $e->getMessage();
        }
        return $return;
    }
    /*Funcion que recibe como parametro un Objeto tipo club y procede a actualizar un club a la
    base de datos */
    public function update_colegiado(ObjClub $objClub)
    {
        $this->objClub = $objClub;
        $sql = "SELECT * FROM club WHERE (id_club = '{$this->objClub->get_id_Club()}') ";
        $request = $this->select_all($sql);
        try {
            $this->valExcepcionesClub->validar_query_insertar($request);
            $sql = "UPDATE club SET codigo_club=?, nombre_club=?, correo_club=?, asociacion_futbol=?,
                            direccion_club=?,fecha_fundacion=?,presidente=?,status=?
							WHERE id_club = '{$this->objClub->get_id_club()}' ";
            //Ingreso de los datos obtenidos a un arreglo de datos
            $arrData = array(
                $this->objClub->get_codigo_club(),
                $this->objClub->get_nombre_club(),
                $this->objClub->get_correo_club(),
                $this->objClub->get_asociacion_futbol(),
                $this->objClub->get_direccion_club(),
                $this->objClub->get_fecha_fundacion(),
                $this->objClub->get_presidente(),
                $this->objClub->get_status());

            $request = $this->update($sql, $arrData);
        } catch (Exception $e) {
            $request = $e->getMessage();
        }
        return $request;
    }

    /*Funcion: Permite eliminar un club, recive
     *@param int $id_club*/
    public function eliminar_club(int $id_club)
    {
        $id_club = $id_club;
        $sql = "DELETE FROM `club` WHERE id_club = id_club";

        $request = $this->delete($sql);
        return $request;
    }

}

// EOF
