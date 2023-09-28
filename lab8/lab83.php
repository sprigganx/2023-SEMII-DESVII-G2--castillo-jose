<?php
    require 'class_lib.php'; 

    $arreglo = new Arreglo();
    $resultado = $arreglo->encontrarElementoMayor();
    $elementoMayor = $resultado['elementoMayor'];
    $posicion = $resultado['posicion'];
    echo "El elemento mayor es $elementoMayor y se encuentra en la posición $posicion.";
?>
