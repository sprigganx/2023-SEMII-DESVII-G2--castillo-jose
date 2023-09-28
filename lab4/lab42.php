<?php
    $n = $_POST ['factorial'];
    $factorial = 1;

    for($n; $n >0; $n--){
        $factorial *= $n;
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial</title>
</head>

<body>
    <h1>Cálculo Factorial</h1>
    <p>Su número factorial es: <?php echo $factorial;?></p> 
</body>

</html>