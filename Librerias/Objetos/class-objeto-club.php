<?php

class ObjClub
{
    private $id_club;
    private $codigo_club;
    private $nombre_club;
    private $correo_club;
    private $asociacion_futbol;
    private $direccion_club;
    private $fecha_fundacion;
    private $presidente;
    private $status;

    /**
     * ObjClub constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function get_id_club(): int
    {
        return $this->id_club;
    }

    /**
     * @param int $id_club
     * @return ObjClub
     */
    public function set_id_club(int $id_club): ObjClub
    {
        $this->id_club = $id_club;
        return $this;
    }

    /**
     * @return string
     */
    public function get_codigo_club(): string
    {
        return $this->codigo_club;
    }

    /**
     * @param string $codigo_club
     * @return ObjClub
     */
    public function set_codigo_club(string $codigo_club): ObjClub
    {
        $this->codigo_club = $codigo_club;
        return $this;
    }

    /**
     * @return string
     */
    public function get_nombre_club(): string
    {
        return $this->nombre_club;
    }

    /**
     * @param string $nombre_club
     * @return ObjClub
     */
    public function set_nombre_club(string $nombre_club): ObjClub
    {
        $this->nombre_club = $nombre_club;
        return $this;
    }

    /**
     * @return string
     */
    public function get_correo_club(): string
    {
        return $this->correo_club;
    }

    /**
     * @param string $correo_club
     * @return ObjClub
     */
    public function set_correo_club(string $correo_club): ObjClub
    {
        $this->correo_club = $correo_club;
        return $this;
    }

    /**
     * @return string
     */
    public function get_asociacion_futbol(): string
    {
        return $this->asociacion_futbol;
    }

    /**
     * @param string $asociacion_futbol
     * @return ObjClub
     */
    public function set_asociacion_futbol(string $asociacion_futbol): ObjClub
    {
        $this->asociacion_futbol = $asociacion_futbol;
        return $this;
    }

    /**
     * @return string
     */
    public function get_direccion_club(): string
    {
        return $this->direccion_club;
    }

    /**
     * @param string $direccion_club
     * @return ObjClub
     */
    public function set_direccion_club(string $direccion_club): ObjClub
    {
        $this->direccion_club = $direccion_club;
        return $this;
    }

    /**
     * @return string
     */
    public function get_fecha_fundacion(): string
    {
        return $this->fecha_fundacion;
    }

    /**
     * @param string $fecha_fundacion
     * @return ObjClub
     */
    public function set_fecha_fundacion(string $fecha_fundacion): ObjClub
    {
        $this->fecha_fundacion = $fecha_fundacion;
        return $this;
    }

    /**
     * @return string
     */
    public function get_presidente(): string
    {
        return $this->presidente;
    }

    /**
     * @param string $presidente
     * @return ObjClub
     */
    public function set_presidente(string $presidente): ObjClub
    {
        $this->presidente = $presidente;
        return $this;
    }

    /**
     * @return int
     */
    public function get_status(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return ObjClub
     */
    public function set_status(int $status): ObjClub
    {
        $this->status = $status;
        return $this;
    }

}

// EOF
