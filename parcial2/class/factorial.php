<?php

require_once('modelo.php');

class Factorial extends ModeloCredencialesBD {
    
    public function __construct() {
        parent::__construct();
    }

    public function insertarResultado($n, $factorial, $sumatoria) {
        $stmt = $this->_db->prepare("CALL sp_insertar_factorial(?, ?, ?)");
        $stmt->bind_param("iid", $n, $factorial, $sumatoria);
        $stmt->execute();
        $stmt->close();
    }    

    public function mostrarHistorial() {
        $consulta = $this->_db->query("CALL sp_mostrar_tabla");
    
        if ($consulta) {
            echo "<h3>Historial de Resultados</h3>";
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>N</th><th>Factorial</th><th>Sumatoria</th></tr>";
    
            while ($fila = $consulta->fetch_assoc()) {
                echo "<tr><td>" . $fila["ID"] . "</td><td>" . $fila["N"] . "</td><td>" . $fila["Factorial"] . "</td><td>" . $fila["Sumatoria"] . "</td></tr>";
            }
    
            echo "</table>";
        } else {
            echo "<p>No hay resultados en el historial.</p>";
        }
    }
    
}

?>
