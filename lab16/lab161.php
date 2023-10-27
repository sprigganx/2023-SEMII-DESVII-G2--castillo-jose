<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 16.1</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <h1>Consulta de Servicio Web de Conversión de Temperatura</h1>
    <form name="FormConv" method="post" action="lab161.php">
    </br>
    Convertir desde <select name="temp">
        <option value="CtoF" SELECTED>°C a °F
        <option value="FtoC" >°F a °C
    </select> el valor
    <input type="number" name="valor" step="Any" required>
    <input name="convert" value="convert" type="submit"/>
    </form>

    <?php
        $servicio = "https://www.w3schools.com/xml/tempconvert.asmx?wsdl";
        $parametros = array();
        if (array_key_exists('convert', $_POST)){
            $valor = $_POST['valor'];
            $temp = $_POST['temp'];

            if($temp=="CtoF"){
                $parametros['Celsius'] =$valor;
                $cliente = new SoapClient($servicio, $parametros);
                $resultadoObj = $cliente->CelsiusToFahrenheit($parametros);
                $resultado = $resultadoObj->CelsiusToFahrenheitResult; 
            }else{
                $parametros['Fahrenheit'] = $valor;
                $cliente = new SoapClient($servicio, $parametros);
                $resultadoObj = $cliente->FahrenheitToCelsius($parametros);
                $resultado = $resultadoObj->FahrenheitToCelsiusResult;
            }
            print("<BR>La temperatura $valor".substr($temp,0,1)." es igual a: $resultado".substr($temp,3,1));
        }
    ?>
</body>
</html>