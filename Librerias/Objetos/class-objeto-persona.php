<?php

class ObjPersona
{
    private $idPersona;
    private $cedula;
    private $nombre;
    private $apellidos;
    private $telefono;
    private $email;
    private $password;
    private $tipoId;
    private $status;

    /**
     * ObjPersona constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function get_id_persona(): int
    {
        return $this->idPersona;
    }

    /**
     * @param int $idPersona
     */
    public function set_id_persona(int $idPersona): void
    {
        $this->idPersona = $idPersona;
    }

    /**
     * @return string
     */
    public function get_cedula(): string
    {
        return $this->cedula;
    }

    /**
     * @param string $cedula
     */
    public function set_cedula(string $cedula): void
    {
        $this->cedula = $cedula;
    }

    /**
     * @return string
     */
    public function get_nombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function set_nombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function get_apellidos(): string
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     */
    public function set_apellidos(string $apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return int
     */
    public function get_telefono(): int
    {
        return $this->telefono;
    }

    /**
     * @param int $telefono
     */
    public function set_telefono(int $telefono): void
    {
        $this->telefono = $telefono;
    }

    /**
     * @return string
     */
    public function get_Email(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function set_email(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function get_password(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function set_password(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function get_tipo_id(): int
    {
        return $this->tipoId;
    }

    /**
     * @param int $tipoId
     */
    public function set_tipo_id(int $tipoId): void
    {
        $this->tipoId = $tipoId;
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
     */
    public function set_status(int $status): void
    {
        $this->status = $status;
    }

}

// EOF
