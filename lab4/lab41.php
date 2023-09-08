<?php
    $ventas = $_POST['ventas'];
    $image = "";

    if ($ventas >= 80) {
        $image = "semaforo/good.png";
    } else if ($ventas >= 50 && $ventas < 80) {
        $image = "semaforo/regular.png";
    }else{
        $image = "semaforo/bad.png";
    }
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imagenes Dinamicas</title>
</head>

<body>
    <h1>Resultado de Ventas</h1>
    <p>Indicador de Ventas: <?php echo $ventas;?></p> 
    <img src="<?php echo $image; ?>" alt="Semaforo"> 
</body>

</html>