<?php

class ObjRoles
{

    private $idRol;
    private $rol;
    private $descripcion;
    private $status;

    /**
     * __construct
     * Constructor por defecto
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * get_id_rol
     *
     * @return void
     */
    public function get_id_rol()
    {
        return $this->idRol;
    }

    /**
     * set_id_rol
     *
     * @param  mixed $idRol
     * @return void
     */
    public function set_id_rol($idRol): void
    {
        $this->idRol = $idRol;
    }

    /**
     * get_rol
     *
     * @return void
     */
    public function get_rol()
    {
        return $this->rol;
    }

    /**
     * set_rol
     *
     * @param  mixed $rol
     * @return void
     */
    public function set_rol($rol): void
    {
        $this->rol = $rol;
    }

    /**
     * get_description
     *
     * @return void
     */
    public function get_descripcion()
    {
        return $this->descripcion;
    }

    /**
     * set_description
     *
     * @param  mixed $descripcion
     * @return void
     */
    public function set_descripcion($descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    /**
     * get_status
     *
     * @return void
     */
    public function get_status()
    {
        return $this->status;
    }

    /**
     * set_status
     *
     * @param  mixed $status
     * @return void
     */
    public function set_status($status): void
    {
        $this->status = $status;
    }

}

// EOF
