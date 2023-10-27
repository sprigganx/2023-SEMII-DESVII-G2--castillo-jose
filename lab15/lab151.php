<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejemplo DataTable JQuery</title>
    <link rel="stylesheet" type="text/css" href="library/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="library/jquery-3.1.1.js"></script>
    <script type="text/javascript" language="javascript" src="library/jquery.dataTables.min.js"></script>
</head>

<body>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#grid').DataTable({
                "lengthMenu" : [5,10,20,50],
                "order" : [[0,"asc"]],
                "language" : {
                    "lengthMenu" : "Mostrar _MENU_ registros por pagina",
                    "zeroRecords" : "No existen resultados en su busqueda",
                    "info" : "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty" : "No hay registros disponibles",
                    "infoFiltered" : "(Buscando entre _MAX_ registros en total)",
                    "search" : "Buscar: ",
                    "paginate" : {
                        "first" : "Primero",
                        "last" : "Ultima",
                        "next" : "Siguiente",
                        "previous" : "Anterior",
                    },
                }
        });

        $("*").css("font-family", "arial").css('font-size', '12px');
    });
    </script>

    <h1>Consulta de noticias</h1>

    <?php
        require_once("class/noticias.php");

        $obj_noticia = new noticia();
        $noticias = $obj_noticia->consultar_noticias();

        $nfilas = count($noticias);

        if($nfilas > 0){
            printf("<TABLE id='grid' class='display' cellspacing='0'>\n");
            printf("<THEAD>");
            printf("<TR>\n");
            printf("<TH>Titulo</TH>\n");
            printf("<TH>Texto</TH>\n");
            printf("<TH>Categoria</TH>\n");
            printf("<TH>Fecha</TH>\n");
            printf("<TH>Imagen</TH>\n");
            printf("</TR>\n");
            printf("</THEAD>");
            printf("<TBODY>");

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
                printf("</TBODY>");
            }
            printf("</TABLE>\n");
        }else{
            printf("No hay noticias disponibles");
        }

    ?>
</body>

</html>