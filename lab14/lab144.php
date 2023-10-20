<?php
    session_start();
?>

<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Laboratorio 9.2</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
    <h1>Consulta de noticias</h1>
    <form name="FormFiltro" method="post" action="lab92.php">
        <br/>
        Filtrar por: <select name="campos">
            <option value="texto" SELECTED>Descripcion
            <option value="titulo">Titulo
            <option value="categoria">Categoria
        </select>
        con el valor
        <input type="text" name="valor">
        <input name="ConsultarFiltro" value="Filtar Datos" TYPE="submit"/>
        <input name="ConsultarTodos" value="Ver todos" TYPE="submit"/>
    </form>

    <?php
        require_once("../lab9/class/noticias.php");

        $obj_noticia = new noticia();
        $noticias = $obj_noticia->consultar_noticias();
        if(array_key_exists('ConsultarTodos' , $_POST)){
            $obj_noticia = new noticia();
            $noticias_new= $obj_noticia->consultar_noticias();
        }

        if(array_key_exists('ConsultarFiltro' , $_POST)){
            $obj_noticia = new noticia();
            $noticias = $obj_noticia->consultar_noticias_filtro($_REQUEST['campos'], $_REQUEST['valor']);
        }

        $nfilas = count($noticias);

        if($nfilas > 0){
            printf("<TABLE>\n");
            printf("<TR>\n");
            printf("<TH>Titulo</TH>\n");
            printf("<TH>Texto</TH>\n");
            printf("<TH>Categoria</TH>\n");
            printf("<TH>Fecha</TH>\n");
            printf("<TH>Imagen</TH>\n");
            printf("</TR>\n");

            foreach ($noticias as $resultado){
                printf("<TR>\n");
                printf("<TD>" . $resultado['titulo'] ."</TD>\n");
                printf("<TD>" . $resultado['texto'] ."</TD>\n");
                printf("<TD>" . $resultado['categoria'] ."</TD>\n");
                printf("<TD>" . date("j/n/Y", strtotime($resultado['fecha'])) ."</TD>\n");

                if ($resultado['imagen'] != "") {
                    printf("<TD><A TARGET='_blank' HREF='img/" . $resultado['imagen'] .
                    "'><IMG BORDER='0' SRC='img/iconotexto.gif'></A></TD>\n");
                }else{
                    printf("<TD>&nbsp;</TD>\n");
                }
                printf("</TR>\n");
            }
            printf("</TABLE>\n");
        }else{
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