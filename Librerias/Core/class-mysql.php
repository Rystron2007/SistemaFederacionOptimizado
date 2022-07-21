<?php

class Mysql extends Conexion
{

    private $conexion;
    private $stringquery;

    /**
     * __construct
     * Constructor por defecto
     * @return void
     */
    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conect();
    }

    /**
     * insert
     * Inserta un registro
     * @param  mixed $query
     * @param  mixed $array
     * @return void
     */
    public function insert(string $query, array $array)
    {

        $insert = $this->conexion->prepare($query);
        $respuestaInsert = $insert->execute($array);
        if ($respuestaInsert) {
            return $this->conexion->lastInsertId();
        }

    }

    /**
     * select
     * Consulta un registro
     * @param  mixed $query
     * @return void
     */
    public function select(string $query)
    {
        $this->stringquery = $query;
        $result = $this->conexion->prepare($this->stringquery);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    /**
     * select_all
     * Consulta todos los registros
     * @param  mixed $query
     * @return void
     */
    public function select_all(string $query)
    {
        $this->stringquery = $query;
        $result = $this->conexion->prepare($this->stringquery);
        $result->execute();
        $data = $result->fetchall(PDO::FETCH_ASSOC);
        return $data;
    }

    /**
     * update
     * Actualiza un registro
     * @param  mixed $query
     * @param  mixed $arrayValues
     * @return void
     */
    public function update(string $query, array $arrayValues)
    {
        $this->stringquery = $query;
        $this->arrayValues = $arrayValues;
        $update = $this->conexion->prepare($this->stringquery);
        $respuestaExecute = $update->execute($this->arrayValues);
        if ($respuestaExecute) {
            $lastInsert = $this->conexion->lastInsertId();
        }
        return $respuestaExecute;
    }

    /**
     * delete
     * Elimina un registro
     * @param  mixed $query
     * @return void
     */
    public function delete(string $query)
    {
        $this->stringquery = $query;
        $result = $this->conexion->prepare($this->stringquery);
        $respuestaExcute = $result->execute();
        return $respuestaExcute;
    }
}

// EOF
