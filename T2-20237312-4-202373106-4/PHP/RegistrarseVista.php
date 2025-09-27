<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>

    <link rel="stylesheet" href="../Styles/Styles2.css">

    <!-- Bootstrap y FontAwesome -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-pzjw8f+ua7Kw1TIq0v8Fq6NfEXyI7p8hIN4d2Ler3P7xj6R76t3XwB5Vd/F5X5aK"
          crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
          integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container mt-6">

    <!-- Menu -->
    <div class="contenido">
        <div class="menu-container">
            <a href="index.php" class="btn-menu"><i class="fa-solid fa-house"></i> Menú</a>
        </div>

    <form action="Registrarse.php" method="POST" class="p-4 border rounded bg-light">
    <h1 class="text-center">REGISTRARSE</h1>
    <hr>

    <?php if (isset($_GET['error'])) { ?>
        <p class="error text-danger">
            <?php echo $_GET['error']; ?>
        </p>
    <?php } ?>

    <!-- Nombre -->
    <div class="form-group">
        <label><i class="fa-solid fa-user"></i> Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Nombre completo" required>
    </div>

    <!-- RUT -->
    <div class="form-group">
        <label><i class="fa-solid fa-id-card"></i> RUT</label>
        <input type="text" name="rut" class="form-control" placeholder="Ej: 123456789" required>
    </div>

    <!-- Correo -->
    <div class="form-group">
        <label><i class="fa-solid fa-user"></i> Correo</label>
        <input type="text" name="Email" class="form-control" placeholder="Correo electronico" required>
    </div>

    <!-- Contraseña -->
    <div class="form-group">
        <label><i class="fa-solid fa-unlock"></i> Contraseña</label>
        <input type="password" name="contrasena" class="form-control" placeholder="Contraseña" required>
    </div>

    <!-- Rol: Autor o Revisor -->
    <div class="form-group">
        <label><i class="fa-solid fa-user-tag"></i> Rol</label>
        <select name="rol" class="form-control" required>
            <option value="" disabled selected>Seleccione su rol</option>
            <option value="0">Autor</option>
            <option value="1">Revisor</option>
        </select>
    </div>

    <hr>

    <!-- Botón de registro -->
    <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </div>

    <div class="text-center mt-3">
        <a href="IniciarSesionVIsta.php">Iniciar Sesión</a>
    </div>
</form>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-LtrjvnR4Twt/qOuYxYV2fN5lZlZ9VV+ukDD0ov2axspksFfl+Jp3FjqD9AbI8xHy"
        crossorigin="anonymous"></script>
</body>
</html>
