<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Matriz de Cruz</title>
</head>
<body>
    <h2>Generador de Matriz Tipo Cruz</h2>
    <form method="post" action="">
        <label for="tamano">Ingrese un número impar:</label>
        <input type="number" name="tamano" id="tamano" required>
        <button type="submit">enviar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $n = isset($_POST['tamano']) ? intval($_POST['tamano']) : 0;

    // Verificar que N sea un número impar
    if ($n % 2 !== 1) {
        echo "El valor de n debe ser impar.";
    } else{

            if ($n > 0) {
                echo "<h3>Matriz Tipo Cruz (Tamaño $n x $n)</h3>";
                echo "<table border='1'>";

                $filaMediaSuma = 0;
                $columnaMediaSuma = 0;
                
                for ($i = 0; $i < $n; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < $n; $j++) {
                        if ($i == floor($n / 2) || $j == floor($n / 2)) {

                            $valor = rand(1, 100);
                            echo "<td>$valor</td>";
                            $filaMediaSuma += $valor;

                            if ($j == floor($n / 2)) {
                            $columnaMediaSuma += $valor;
                            }

                        } else {
                            echo "<td>0</td>";
                        }
                        
                    }
                    echo "</tr>";
                    
                }
                echo "</table>";

                echo "<p>Suma de la fila del medio: $filaMediaSuma</p>";
                echo "<p>Suma de la columna del medio: $columnaMediaSuma</p>";

            } else {
                echo "Ingrese un valor válido para el tamaño de la matriz.";
            }
    }
}
?>
</body>
</html>
