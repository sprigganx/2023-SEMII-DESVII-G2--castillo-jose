<?php
    session_start ();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laboratorio 12</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
    <h1>Manejo de sesiones</h1>
    <h2>Paso 2: se accede a la variable de sesion almacenada y se destruye</h2>
    <?php
        if(isset($_SESSION['var'])){
            $var = $_SESSION['var'];
            print("<P>Valor de la variable de sesion: $var</P>\n");
            unset ($_SESSION['var']);
            print ("<A HREF='lab123.php'>Paso 3</A>");
        }else{
            print ("Sesion no iniciada, ir al <A HREF='lab121.php'>paso 1</A> para iniciar la sesion");
        }
    ?>
</body>

</html>