<?php
    $n = $_POST ['factorial'];
    require 'class_lib.php';

    // Instanciar la clase Ventas
    $factorial = new Factorial($n);

    // Obtener las imágenes seleccionadas
    $nfactorial = $factorial->nFactorial();

    // Mostrar las imágenes
    echo "<h1>Cálculo Factorial</h1>";
    echo "Su número factorial es: $nfactorial"; 

?>