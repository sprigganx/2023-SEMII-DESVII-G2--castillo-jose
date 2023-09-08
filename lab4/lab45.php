<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $orden = $_POST['orden'];
        
        // Verificar que N sea un número par
        if ($orden % 2 != 0) {
            echo "El valor de N debe ser un número par. Por favor, inténtelo de nuevo.";
            exit;
        }
        
        // Generar y mostrar la matriz identidad
        echo "<h2>Matriz Identidad de orden $orden</h2>";
        echo "<table border='1'>";
        
        for ($i = 0; $i < $orden; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $orden; $j++) {
                if ($i == $j) {
                    echo "<td>1</td>"; // Elemento de la diagonal principal
                } else {
                    echo "<td>0</td>"; // Otros elementos
                }
            }
            echo "</tr>";
        }
        
        echo "</table>";
    }
?>
