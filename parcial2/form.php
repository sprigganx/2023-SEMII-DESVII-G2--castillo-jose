<?php
require_once('class/factorial.php');

$factorialCalculator = new Factorial();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = $_POST["numero"];

    $suma = 0;

    for ($i = 1; $i <= $n; $i++) {
        $numerador = 1;
        for ($j = 1; $j <= $i; $j++) {
            $numerador *= $j;
        }

        $denominador = $numerador + 1;

        $termino = $numerador / $denominador;
        $suma += $termino;
    }

    $factorialCalculator->insertarResultado($n, $numerador, $suma);
}

$factorialCalculator->mostrarHistorial();
?>
