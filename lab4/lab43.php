<?php
$miArreglo = array();

for ($i = 0; $i < 20; $i++) {

    $miArreglo[] = $i; // Agregar el valor al arreglo
}

// Encontrar el elemento mayor
$elementoMayor = max($miArreglo);
// Encontrar la posición del elemento mayor
$posicion = array_search($elementoMayor, $miArreglo);
// Mostrar el arreglo
echo "Arreglo llenado: <br/><br/>";
print_r($miArreglo);

// Mostrar la posición y el valor del elemento mayor
echo "<br/><br/> El elemento mayor está en la posición $posicion y tiene el valor $elementoMayor.";
?>
