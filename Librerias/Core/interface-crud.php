<?php

interface Crud
{

    /**
     * get_individual
     * Preparacion para obtener Objeto en cada Modelo
     * @param  mixed $id
     * @return void
     */
    public function get_individual(int $id);

    /**
     * get_all
     * Preparacion para obtener todos los Objeto en cada Modelo
     * @return void
     */
    public function get_all();

    /**
     * set_registro
     * Preparación para realizar un Registro en cada Modelo
     * @return void
     */
    public function set_registro();

    /**
     * update_registro
     * Preparación para realizar una Actualización en cada Modelo
     * @return void
     */
    public function update_registro();

    /**
     * delete_registro
     * Preparación para realizar un Borrado en cada Modelo
     * @return void
     */
    public function delete_registro();

}

// EOF
