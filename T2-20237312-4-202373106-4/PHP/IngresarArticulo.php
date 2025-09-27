<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>

    <link rel="stylesheet" href="../Styles/Styles3.css">

    <!-- Bootstrap y FontAwesome -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-pzjw8f+ua7Kw1TIq0v8Fq6NfEXyI7p8hIN4d2Ler3P7xj6R76t3XwB5Vd/F5X5aK"
          crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
          integrity="sha512-Evv84Mr4kq VGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container mt-6">
    
    <!-- Menu -->
    <div class="contenido">
        <div class="menu-container">
            <a href="Inicio.php" class="btn-menu"><i class="fa-solid fa-house"></i> Volver al inicio</a>
        </div>

    <?php if (isset($_GET['success']) && $_GET['success'] === 'articulo_enviado'): ?>
        <p class="success">
            Artículo enviado a un supervisor para ser verificado.
        </p>
    <?php endif; ?>

    <form action="Ingresarbd.php" method="POST" class="p-4 border rounded bg-light">
    <h1 class="text-center">Articulo</h1>
    <hr>

    <?php if (isset($_GET['error'])) { ?>
        <p class="error text-danger">
            <?php echo $_GET['error']; ?>
        </p>
    <?php } ?>

    <!-- Topico/s -->
    <div class="form-group">
        <label><i class="fa-solid fa-user-tag"></i> Tópico/s</label>
        <select name="topico[]" class="form-control" multiple required>
            <option value="1">IA</option>
            <option value="2">Big Data</option>
            <option value="3">Ciberseguridad</option>
            <option value="4">Redes</option>
            <option value="5">Software</option>
            <option value="6">Embebidos</option>
            <option value="7">Gráfica</option>
            <option value="8">BD</option>
            <option value="9">Blockchain</option>
            <option value="10">Robótica</option>
            <option value="11">RA</option>
            <option value="12">IoT</option>
            <option value="13">ML</option>
            <option value="14">Cuántica</option>
            <option value="15">Bioinfo</option>
            <option value="16">Lenguajes</option>
            <option value="17">Conocimiento</option>
            <option value="18">Distribuidos</option>
            <option value="19">DevOps</option>
            <option value="20">Algoritmos</option>
        </select>
        <small class="form-text text-light">Mantén presionada Ctrl para seleccionar varios tópicos.</small>
    </div>

    <!-- Nombre del articulo-->
    <div class="form-group">
        <label><i class="fa-solid fa-user"></i> Nombre del articulo</label>
        <input type="text" name="nombrearticulo" class="form-control" placeholder="Nombre" required>
    </div>

    <!-- Resumen -->
    <div class="form-group">
        <label><i class="fa-solid fa-id-card"></i> Resumen</label>
        <input type="text" name="resumen" class="form-control" placeholder="Resumen" required>
    </div>

    <!-- Fecha de envio -->
    <div class="form-group">
        <label><i class="fa-solid fa-user"></i> Fecha de envío</label>
        <input type="date" name="fecha_envio" class="form-control" required>
    </div>

    <!-- Participante 1 -->
    <div class="form-group">
        <label><i class="fa-solid fa-unlock"></i> Participante 1</label>
        <input type="email" name="participante1" class="form-control" placeholder="Correo" required>
    </div>
    
    <!-- Participante 2 -->
    <div class="form-group">
        <label><i class="fa-solid fa-unlock"></i> Participante 2 (Opcional)</label>
        <input type="email" name="participante2" class="form-control" placeholder="Correo">
    </div>

    <hr>

    <!-- Botón de registro -->
    <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary">IngresarArticulo</button>
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
