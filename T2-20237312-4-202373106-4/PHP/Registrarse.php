<?php
include("Conexion.php");

if (!empty($_POST['Email'])) {
    if (empty($_POST["Email"]) || empty($_POST["contrasena"]) || !isset($_POST["rol"]) || ($_POST["rol"] !== "0" && $_POST["rol"] !== "1") || empty($_POST["nombre"]) || empty($_POST["rut"])) {
            echo "Uno de los campos está vacío o el rol no es válido";
            exit();
    } else {
        $nombre = $conexion->real_escape_string($_POST["nombre"]);
        $rut = (int)$_POST["rut"];
        $email = $conexion->real_escape_string($_POST["Email"]);
        $contrasena = $conexion->real_escape_string($_POST["contrasena"]);
        $rol = (int)$_POST["rol"];
        
        $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

        $sql = "INSERT INTO Personas (Rut, Nombre, Email, contraseña, Rol) VALUES ($rut, '$nombre', '$email', '$contrasena_hash', $rol)";

        if ($conexion->query($sql) === TRUE) {
            if ($rol === 0) {
                $conexion->query("INSERT INTO Autores (Rut) VALUES ($rut)");
            } else {
                $conexion->query("INSERT INTO Revisores (Rut) VALUES ($rut)");
            }
            header("Location: IniciarSesionVista.php");
            exit();
        } else {
            echo "Error al registrar: " . $conexion->error;
        }
    }
} else {
    echo "Formulario no enviado correctamente";
}

?>
