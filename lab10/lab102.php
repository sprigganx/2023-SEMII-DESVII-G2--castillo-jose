<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Laboratorio 10.2</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
    <h1>Encuesta. Resultados de la votacion</h1>

    <?php
        require_once("class/votos.php");

        $obj_votos = new votos();
        $result_votos = $obj_votos->listar_votos();

        foreach ($result_votos as $result_voto){
            $votos1= $result_voto['votos1'];
            $votos2= $result_voto['votos2'];
        }
        $totalVotos = $votos1 + $votos2;

        printf("<TABLE>\n");

        printf("<TR>\n");
        printf("<TH>Respuesta</TH>\n");
        printf("<TH>Votos</TH>\n");
        printf("<TH>Porcentaje</TH>\n");
        printf("<TH>Representacion grafica</TH>\n");
        printf("</TR>\n");

        $porcentaje = round(($votos1/$totalVotos)*100,2);
        printf("<TR>\n");
        printf("<TD CLASS='izquierda'>Si</TD>\n");
        printf("<TD CLASS='derecha'>$votos1</TD>\n");
        printf("<TD CLASS='derecha'>$porcentaje%%</TD>\n");
        printf("<TD CLASS='izquierda' WIDTH='400'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='".
         $porcentaje*4 . "'></TD>\n");
        printf("</TR>\n");

        $porcentaje = round(($votos2/$totalVotos)*100,2);
        printf("<TR>\n");
        printf("<TD CLASS='izquierda'>No</TD>\n");
        printf("<TD CLASS='derecha'>$votos2</TD>\n");
        printf("<TD CLASS='derecha'>$porcentaje%%</TD>\n");
        printf("<TD CLASS='izquierda' WIDTH='400'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='".
         $porcentaje*4 . "'></TD>\n");
        printf("</TR>\n");

        printf("</TABLE>\n");
        printf("<p>Numero total de votos emitidos: $totalVotos</p>\n");
        printf("<p><a HREF='lab101.php'>Pagina de votacion</a></p>\n");
    ?>

</body>

</html>