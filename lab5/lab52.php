<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se ha subido un archivo
    if (isset($_FILES['nombre_archivo_cliente'])) {
        $nombreDirectorio = "archivos/";
        $nombreArchivo = $_FILES['nombre_archivo_cliente']['name'];
        $nombreCompleto = $nombreDirectorio . $nombreArchivo;

        // Obtener la extensión del archivo
        $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);

        // Array de extensiones válidas para imágenes
        $extensionesValidas = array("jpg", "jpeg", "png", "gif");

        if (in_array(strtolower($extension), $extensionesValidas)) {
            // Verificar si el archivo ya existe en el directorio
            if (is_file($nombreCompleto)) {
                $idUnico = time();
                $nombreArchivo = $idUnico . "-" . $nombreArchivo;
                $nombreCompleto = $nombreDirectorio . $nombreArchivo;
                echo "Archivo repetido, se cambió el nombre a $nombreArchivo <br><br>";
            }

            // Mover el archivo subido al directorio destino
            if (move_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'], $nombreCompleto)) {
                echo "El archivo se ha subido satisfactoriamente al directorio $nombreDirectorio <br>";
            } else {
                echo "No se pudo mover el archivo al directorio $nombreDirectorio <br>";
            }
        } else {
            // Mostrar una alerta de error si no es una imagen
            echo "El archivo no es una imagen válida (jpg, jpeg, gif, png).";
            echo "<script>alert('El archivo no es una imagen válida (jpg, jpeg, gif, png).');</script>";
        }
    } else {
        echo "No se ha subido ningún archivo <br>";
    }
}
?>
