<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

require_once 'Conexion.php';

class CantidadDeFilas {
    public function 
    total() {
        $sql = "SELECT * FROM sistema_php";
        $resultado = $GLOBALS['base']->conexion->query($sql);
        $numeroDeFilas = mysqli_num_rows($resultado);

        exit(json_encode($numeroDeFilas));
    }
}
$cantidadDeFilas = new CantidadDeFilas();
$cantidadDeFilas->total();
