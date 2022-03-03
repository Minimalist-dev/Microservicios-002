<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

require_once 'Conexion.php';

class Borrar {
    public function 
    datos() {
        $dato = file_get_contents("php://input");
        
        $sql = $GLOBALS["base"]->conexion->query("DELETE FROM sistema_php WHERE id = '".$dato."'");
        
        echo !empty($sql) ? "Eliminado con exito." : "<span>No se ha borrado.</span>";
    }
}
$borrar = new Borrar();
$borrar->datos();
