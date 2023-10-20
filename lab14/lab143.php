<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Laboratorio 11.1</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>

    <h1>Consulta de noticias</h1>
    <?php
        require_once("../lab11/class/noticias.php");

        $comienzo = isset($_GET['comienzo']) ? $_GET['comienzo'] : 0;
        $num = 5;
        
        $obj_noticia = new noticia();
        $noticias = $obj_noticia->consultar_noticiasPaginadas($comienzo, $num);
        
        $nfilas = count($noticias);
        
        // Mostrar información de paginación
        $totalRegistros = 7; // Reemplaza con el total de registros en la base de datos
        $paginaActual = ($comienzo / $num) + 1;
        $paginaAnterior = max(1, $paginaActual - 1);
        $paginaSiguiente = min(ceil($totalRegistros / $num), $paginaActual + 1);

        echo "Mostrando noticias " . ($comienzo + 1) . " a " . ($comienzo + $nfilas) . " de un total de $totalRegistros. ";
        if ($paginaAnterior != $paginaActual) {
            echo "[ <a href='" . $_SERVER['PHP_SELF'] . "?comienzo=" . ($paginaAnterior - 1) * $num . "'>Anterior</a> | Siguiente ]";
        }else{
            echo "[ Anterior | <a href='" . $_SERVER['PHP_SELF'] . "?comienzo=" . ($paginaSiguiente - 1) * $num . "'>Siguiente</a> ]";
        }
       
        if ($nfilas > 0) {
            printf("<TABLE>\n");
            printf("<TR>\n");
            printf("<TH>Titulo</TH>\n");
            printf("<TH>Texto</TH>\n");
            printf("<TH>Categoria</TH>\n");
            printf("<TH>Fecha</TH>\n");
            printf("<TH>Imagen</TH>\n");
            printf("</TR>\n");

            foreach ($noticias as $resultado) {
                printf("<TR>\n");
                printf("<TD>" . $resultado['titulo'] . "</TD>\n");
                printf("<TD>" . $resultado['texto'] . "</TD>\n");
                printf("<TD>" . $resultado['categoria'] . "</TD>\n");
                printf("<TD>" . date("j/n/Y", strtotime($resultado['fecha'])) . "</TD>\n");

                if ($resultado['imagen'] != "") {
                    printf("<TD><A TARGET='_blank' HREF='img/" . $resultado['imagen'] .
                    "'><IMG BORDER='0' SRC='img/iconotexto.gif'></A></TD>\n");
                } else {
                    printf("<TD>&nbsp;</TD>\n");
                }
                printf("</TR>\n");
            }
            printf("</TABLE>\n");

        } else {
            printf("No hay noticias disponibles");
        }
    ?>
    <?php
        if (isset($_SESSION["usuario_valido"])){
            print("<p>[ <A HREF='login.php'>Menu principal</A> ]</p>");
    
        }else{
            print ("<br><br>\n");
            print ("<p ALIGN='CENTER'>Acceso no autorizado</p>\n");
            print ("<p ALIGN='CENTER'>[ <A HREF='login.php' TARGET='_top'>Conectar</A> ]</p>\n");
        }
    ?>
    
</body>

</html>
