<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Meta etiquetas esenciales -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Para compatibilidad con IE -->
    
    <link rel="stylesheet" href="../Styles/Styles.css">
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-pzjw8f+ua7Kw1TIq0v8Fq6NfEXyI7p8hIN4d2Ler3P7xj6R76t3XwB5Vd/F5X5aK"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Inicio de Sesión</title>

</head>

<body>
    <div class="contenido">
        <div class="menu-container">
            <a href="index.php" class="btn-menu"><i class="fa-solid fa-house"></i> Menú</a>
        </div>
    <form action="iniciarSesion.php" method="POST">
        <h1>INICIAR SESION</h1>
        <hr>
        <?php
            if (isset($_GET['error'])) {
                ?>
                <p class="error">
                    <?php 
                    echo $_GET['error']; 
                    ?>
                </p>
        <?php
            }
        ?>

        <label><i class="fa-solid fa-user"></i> Correo</label>
        <input type="text" name="Email" placeholder="Nombre de usuario">

        <label><i class="fa-solid fa-unlock"></i> Contraseña</label>
        <input type="password" name="contrasena" placeholder="Contraseña">
        <hr>
        <button type="submit">Iniciar Sesión</button>
        <a href="RegistrarseVista.php">Crear Cuenta</a>



    </form>
</body>
</html>
