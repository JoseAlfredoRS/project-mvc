<?php

require_once dirname(__FILE__, 2) . '/config/Conexion.php';

class Prueba_Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Conexion;
    }

    public function funcion()
    {
        //
    }
}
