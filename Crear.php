<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

require_once 'Conexion.php';

class Crear {
    private $sql;

    public function 
    datos() {
        if (isset($_POST['crear-envio'])) {
            $id     = $_POST["id"];
            $marca  = $_POST['marca'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];

            if (empty($id)) {
                $this->sql = $GLOBALS["base"]->conexion-> 
                query("INSERT INTO sistema_php VALUES (NULL, '$nombre', '$marca', '$precio', NOW())");                  

                echo !empty($this->sql) ? "Creado con exito." : "<span>No se ha creado.</span>";
            } else {
                $this->sql = $GLOBALS["base"]->conexion-> 
                query("UPDATE sistema_php SET nombre='$nombre', marca='$marca', precio='$precio' WHERE id=".$id);  
            
                echo !empty($this->sql) ? "Actualizadocon exito." : "<span>No se ha actualizado.</span>";
            }
        } else {
            echo "<span>No se a podido crear datos.<span>";
        }
    }
} 
      
$crear = new Crear();
$crear->datos();
