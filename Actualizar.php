<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

require_once 'Conexion.php';

class Actualizar {
    public function 
    datos() {
        $dato = file_get_contents("php://input");
        
        $sql = $GLOBALS['base']->conexion->query("SELECT * FROM sistema_php WHERE id = '".$dato."'");
        $resultado = $sql->fetch_all(MYSQLI_ASSOC);
        exit(json_encode($resultado));
    }
}

$actualizar = new Actualizar();
$actualizar->datos();
