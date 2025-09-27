<?php
session_start();
include("Conexion.php");

if (isset($_POST['Email']) && isset($_POST['contrasena'])) {

    function valide($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $usuario = valide($_POST['Email']);
    $clave = valide($_POST['contrasena']);

    if (empty($usuario)) {
        header("Location: IniciarSesionVIsta.php?error=El correo es requerido");
        exit();
    } elseif (empty($clave)) {
        header("Location: IniciarSesionVIsta.php?error=La contraseña es requerida");
        exit();
    } else {
        // Usamos prepared statements para evitar SQL Injection
        $stmt = $conexion->prepare("SELECT * FROM Personas WHERE Email = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $row = $resultado->fetch_assoc();

            if (password_verify($clave, $row['contraseña'])) {
                $_SESSION['rut'] = $row['Rut'];
                $_SESSION['nombre'] = $row['Nombre'];
                $_SESSION['rol'] = $row['Rol'];
                header("Location: inicio.php");
                exit();
            } else {
                header("Location: IniciarSesionVIsta.php?error=Contraseña incorrecta");
                exit();
            }
        } else {
            header("Location: IniciarSesionVIsta.php?error=Usuario no encontrado");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>
