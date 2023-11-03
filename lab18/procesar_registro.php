<?php
    function verificar_email($email)
    {
        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
            return true;
        }
        return false;
    }

    function verificar_password_strength($password)
    {
        if (preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/", $password)) {
            return true;
        } else {
            return false;
        }
    }    

    function verificar_ip($ip)
    {
        return preg_match("/^([1-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])" . "(\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3}$/", $ip);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password_repeat = $_POST["password_repeat"];
        $ip = $_POST["ip"];

        if (empty($nombre) || empty($apellido) || empty($email) || empty($password) || empty($password_repeat) || empty($ip)) {
            echo '<script>alert("Todos los campos son requeridos.");</script>';
            echo '<script>window.location.href = "formulario.html";</script>';
        } else if (!verificar_email($email)) {
            echo '<script>alert("Email no válido. Ejemplo de formato válido: usuario@dominio.com");</script>';
            echo '<script>window.location.href = "formulario.html";</script>';
        } else if ($password != $password_repeat) {
            echo '<script>alert("Las contraseñas no coinciden.");</script>';
            echo '<script>window.location.href = "formulario.html";</script>';
        } else if (!verificar_password_strength($password)) {
            echo '<script>alert("La contraseña no es lo suficientemente segura. Debe tener al menos 8 caracteres, incluir al menos una letra mayúscula, una letra minúscula y un número.");</script>';
            echo '<script>window.location.href = "formulario.html";</script>';
        } else if (!verificar_ip($ip)) {
            echo '<script>alert("Dirección IP no válida. Ejemplo de formato válido: 192.168.0.1");</script>';
            echo '<script>window.location.href = "formulario.html";</script>';
        } else {
            // Mostrar una alerta de éxito
            echo '<script>alert("Usuario registrado exitosamente.");</script>';
            
            // Redirigir al usuario de nuevo al formulario HTML después de la alerta de éxito
            echo '<script>window.location.href = "formulario.html";</script>';
        }        
    }
?>
