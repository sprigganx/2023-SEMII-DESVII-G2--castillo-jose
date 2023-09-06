<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 2.5</title>
</head>

<body>
    <?php
    $figuras = array('cuadrado', 'triángulo', 'circulo');
    $figuras[1] = 'rectángulo';
    mostrar_figuras($figuras, "asignacion de rectangulo");
    array_push($figuras, 'pentagono');
    mostrar_figuras($figuras, "adicion de pentagono al final");
    array_unshift($figuras, 'hexagono');
    mostrar_figuras($figuras, "adicion de hexagono al inicio");
    array_pop($figuras);
    mostrar_figuras($figuras, "eliminacion del ultimo");
    array_shift($figuras);
    mostrar_figuras($figuras, "eliminacion del primero");
    function mostrar_figuras($figuras, $mensaje)
    {
        echo "<br›Arreglo despues de $mensaje <br>";
        foreach ($figuras as $figura) {
            echo "$figura <br>";
        }
    } ?>
</body>

</html>