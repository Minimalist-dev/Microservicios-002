<?php

class Conexion {
    public $conexion;
    private $host     = "localhost";
    private $usuario  = "root";
    private $codigo   = "";
    private $bd       = "javascript";
    private $charset  = "utf8";

    public function
    __construct() {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->codigo, $this->bd);
        
        if($this->conexion->connect_errno) { exit(); } 
        
        $this->conexion->set_charset($this->charset);
    }
}

$base = new Conexion();
