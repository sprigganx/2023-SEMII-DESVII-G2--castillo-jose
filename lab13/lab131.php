<?php
    if (isset($_COOKIE['contador'])){
        setcookie('contador', $_COOKIE['contador'] + 1, time() + 365 * 24 * 60 * 60);
        $mensaje = 'Gracias por visitarnos. Número de visitas: ' . $_COOKIE['contador'];
    }else{
        //Caduca en un año
        setcookie('contador', 1, time() + 365 * 24 * 60 * 60);
        $mensaje = 'Bienvenido a nuestro sitio web';
    }
?>

<!DOCTYPE html>

<html XMLNS="http://www.w3.org/1999/xhtml" xml:lang="es" lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Laboratorio 13</title>
</head>

<body>
    <h1>Contador de visitas con Cookies</h1>
    <h3><?php echo $mensaje; ?></h3>
    </P>
</body>

</html>