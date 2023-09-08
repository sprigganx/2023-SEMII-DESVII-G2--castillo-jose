<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numeros = $_POST['numeros'];

        // Verificar que todos los números sean pares
        $numerosPares = array_filter($numeros, function ($numero) {
            return $numero % 2 == 0;
        });

        if (count($numerosPares) === count($numeros)) {
            echo "Los números ingresados pares son: " . implode(', ', $numerosPares);
        } else {
            // Al menos un número no es par, mostrar un mensaje de error
            echo "Alguno de los números ingresados no es par. Por favor, inténtalo de nuevo.";
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.2</title>
</head>

<body>
    <h1>Formulario de Números Pares</h1>
    <form method="post">
    <?php
        // Establece el número de elementos del arreglo
        $numElementos = 5;
        for ($i = 0; $i < $numElementos; $i++) {
            echo "<label for='numero{$i}'>Número " . ($i + 1) . " (par): </label>";
            echo "<input type='number' name='numeros[]' id='numero{$i}' min='2' step='2' required><br>";
        }
    ?>
    <button type="submit">Enviar</button>
    </form>
</body>

</html>
