<?php
    $ventas = $_POST['ventas'];

    require 'class_lib.php';

    // Instanciar la clase Ventas
    $ventas = new Ventas($ventas);

    // Obtener las imágenes seleccionadas
    $imagen = $ventas->seleccionarImagenes();

    // Mostrar las imágenes
    echo "<h2>Imágenes Dinámicas</h2>";
    echo "<img src='$imagen' alt='Semaforo'>"; 

?>