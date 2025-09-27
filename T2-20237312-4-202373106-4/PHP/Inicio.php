<?php 
session_start();
?>
<!doctype html>
<html lang="es">
<head>
  <title>Buscador en Tiempo Real</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>
<body>

<!-- Navbar superior -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <!-- Botón cerrar sesión a la izquierda -->
    <a class="btn btn-outline-light" href="CerrarSesion.php">Cerrar Sesión</a>

    <!-- Mostrar botón solo si es autor -->
    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == 0): ?>
      <a class="btn btn-outline-light" href="IngresarArticulo.php">Ingresar Articulo</a>
    <?php endif; ?>
  </div>
</nav>

<div class="container mt-4">
  <?php if (isset($_GET['success']) && $_GET['success'] === 'articulo_enviado'): ?>
    <div class="alert alert-success" style="width: 100%; text-align: center;">
      Artículo enviado a un supervisor para ser verificado.
    </div>
  <?php endif; ?>

  <div class="form-row mb-3">
    <div class="col">
      <input type="text" id="buscarTitulo" class="form-control" placeholder="Buscar por título" />
    </div>
    <div class="col">
      <input type="text" id="buscarTopico" class="form-control" placeholder="Buscar por tópico" />
    </div>
    <div class="col">
      <input type="date" id="buscarFecha" class="form-control" placeholder="Buscar por fecha" />
    </div>
  </div>

  <div id="datos_buscador" class="mt-3"></div>
</div>

<script>
  function buscar_ahora() {
    var titulo = $('#buscarTitulo').val();
    var topico = $('#buscarTopico').val();
    var fecha = $('#buscarFecha').val();

    $.ajax({
      url: 'buscador.php',
      type: 'POST',
      data: { titulo: titulo, topico: topico, fecha: fecha },
      success: function(data) {
        $('#datos_buscador').html(data);
      },
      error: function() {
        $('#datos_buscador').html('<div class="alert alert-danger">Error en la búsqueda</div>');
      }
    });
  }

  // Ejecuta la búsqueda en tiempo real
  $('#buscarTitulo, #buscarTopico').on('input', buscar_ahora);
  $('#buscarFecha').on('change', buscar_ahora);

  // Buscar inicialmente al cargar la página
  $(document).ready(function() {
    buscar_ahora();
  });
</script>

</body>
</html>
