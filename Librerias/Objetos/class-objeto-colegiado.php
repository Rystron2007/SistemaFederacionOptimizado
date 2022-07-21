<?php

class ObjColegiado
{
    private $idColegiado;
    private $idPersona;
    private $codFederacion;
    private $status;

    /**
     * ObjColegiado constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function get_id_colegiado(): int
    {
        return $this->idColegiado;
    }

    /**
     * @param int $idColegiado
     * @return ObjColegiado
     */
    public function set_id_colegiado(int $idColegiado): ObjColegiado
    {
        $this->idColegiado = $idColegiado;
        return $this;
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
     * @return ObjColegiado
     */
    public function set_id_persona(int $idPersona): ObjColegiado
    {
        $this->idPersona = $idPersona;
        return $this;
    }

    /**
     * @return string
     */
    public function get_cod_federacion(): string
    {
        return $this->codFederacion;
    }

    /**
     * @param string $codFederacion
     * @return ObjColegiado
     */
    public function set_cod_federacion(string $codFederacion): ObjColegiado
    {
        $this->codFederacion = $codFederacion;
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
     * @return ObjColegiado
     */
    public function set_status(int $status): ObjColegiado
    {
        $this->status = $status;
        return $this;
    }

}

// EOF
