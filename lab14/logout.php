<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desconectar</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
    <?php
        if (isset($_SESSION["usuario_valido"])){

            session_destroy ();
            print ("<BR><BR><P ALIGN='CENTER'>Conexion finalizada</P>\n");
            print ("<P ALIGN='CENTER'>[ <A HREF='login.php'>Conectar</a> ]</P>\n");

        }else{

            print ("<BR><BR>\n");
            print ("<P ALIGN='CENTER'>No existe una conexion activa</P>\n");
            print ("<P ALIGN='CENTER'>[ <A HREF='login.php'>Conectar</A> ]</P>\n");
        }
    ?>
</body>
</html>