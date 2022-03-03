<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

require_once 'Conexion.php';
        
class Leer {
    private $sql;
    private $resultado;
    private const SELECT = "SELECT * FROM sistema_php ORDER BY";
//    private $obtener;

    public function
    datos() {
//        $this->obtener = array();
        
        if(!empty($_POST['buscar'])) {
            $this->sql = $GLOBALS['base']->conexion->query("SELECT * FROM sistema_php WHERE id LIKE '%" . $_POST['buscar'] . "%' LIMIT 4");
            $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);
        } elseif (!empty ($_POST['cantidad'])) {
            $this->sql = $GLOBALS['base']->conexion->query(self::SELECT . " id DESC LIMIT " . $_POST['cantidad']);
            $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);
        } elseif (!empty ($_POST['por'])) {
            $this->sql = $GLOBALS['base']->conexion->query(self::SELECT . " '" . $_POST['por'] . "' ASC LIMIT 4");
            $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);
        } elseif (!empty ($_POST['ordenar'])) {
            $this->sql = $GLOBALS['base']->conexion->query(self::SELECT . " id " . $_POST['ordenar'] . " LIMIT 4");
            $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);
        } elseif (!empty ($_POST['inicio-de-paginacion'])) {
            $this->sql = $GLOBALS['base']->conexion->query(self::SELECT . " id DESC LIMIT 4 OFFSET " . $_POST['inicio-de-paginacion']);
            $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);
        } else {
            $this->sql = $GLOBALS['base']->conexion->query(Leer::SELECT . " id DESC LIMIT 4");
            $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);
        }
        
//        foreach ($this->resultado as $valor) {
//            array_push($this->obtener, array(
//                "id"        => $valor["id"],
//                "nombre"    => $valor["nombre"],
//                "marca"     => $valor["marca"],
//                "precio"    => $valor["precio"],
//                "fecha"     => $valor["fecha"]
//            ));
//        }
//        
//        exit(json_encode($this->obtener));
        exit(json_encode($this->resultado));
    }
}
$leer = new Leer();
$leer->datos();