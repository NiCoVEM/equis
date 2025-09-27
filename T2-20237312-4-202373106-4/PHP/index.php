<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mi sitio con Bootstrap</title>
  <!-- Bootstrap 5 CSS desde CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Si necesitas estilos propios, usa la ruta relativa correcta -->
  <!-- <link rel="stylesheet" href="../Styles/Styles.css"> -->
</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<style>

.custom-height-1 {
    height: auto;
}

.mb-9 {
  margin-bottom: 9rem;
}

.mb-17 {
  margin-bottom: 17rem;
}

.btn-azul {
  background-color: rgba(40, 95, 112, 0.5);
  border-color: rgb(255, 255, 255);
  color: white;
}
.btn-gris {
  background-color: rgb(80, 80, 80, 0.5);
  border-color: rgb(255, 255, 255);
  color: white;
  margin-top: 14px;
}

.banner {
    background: url("../imagenes/desktop-wallpaper-full-solid-color-solid-color-color.jpg") no-repeat;
    background-size: cover;
    background-position: top left;
}

.banner-content > h1{
    font-size: 40px;
    font-weight: normal;
    margin-bottom: 2rem;
}

.banner-content > h3{
    font-size: 25px;
    font-weight: normal;
    margin-bottom: 2rem;
}

.custom-text2 {
    text-align: right;
    margin-right: 20px;
    font-size: 24px;
    font-weight: bold;
    color: #000000;
    transition: all 0.3s ease-in-out;
}
.custom-text2:hover {
    color: #666;
    transform: scale(1.02);
}

.move-right {
    margin-left: auto;
    margin-right: 0;
    display: block;
}

.barra-superior {
    background-color: rgba(30, 64, 136, 0.2); /* Gris claro con 50% de transparencia */
    border-bottom: 2px solid rgba(255, 255, 255, 0.2);
    padding: 5px 0;
    margin-bottom: 100px;
}
</style>
    
    <section class="banner">
        <!--Barra de arriba-->
        <section class="barra-superior">
            <div class="container-fluid text-center">
                <div class="row align-items-center custom-height-1 mb-3">
                    <div class="col-lg-6">
                        <div class="banner-img">
                            <img src="../imagenes/logo-usm.png" class="img-fluid float-start" width="150" height="150">
                        </div>
                    </div> 
                    <div class="col-lg-6 p-0 text-end">
                        <a href="RegistrarseVista.php" class="btn btn-gris text-uppercase fw-border" style="margin-right: 10px; ">Registrarse</a>
                    </div>
                </div>
            </div>
        </section>
        <!--General-->
        <div class="container"> 
            <div class="row align-items-center justify-content-between mb-17">
                <div class="col">
                    <div class="banner-content">
                        <h1 class="text-uppercase fw-bolder">Mundo de articulos</h1>
                        <h3 class="border-bottom border-primary border-5 pb-4">"¡Gestiona tus archivos, verifica su contenido y consulta sus puntajes, todo desde un solo lugar!"</h3>
                        <a href="IniciarSesionVista.php" class="btn btn-gris text-uppercase fw-border">Iniciar Sesión</a>
                    </div>
                </div>
                <div class="col"> 
                    <div class="banner-img">
                        <img src="../imagenes/LogoArticulo.png" alt="Portada de Busca La Ayuda En Ti" class="img-fluid" style="width: 70%; height: 500px; float: right;">
                    </div>
                </div>
            </div>
        </div>

        <div class="container"> 
            <div class="row">
                <div class="col">
                </div>
            </div>
        </div>
        <!--derechos de autor-->
        <footer class="footer">
            <div class="container">
              <p>&copy; 2023 Nombre de la pag. Todos los derechos reservados.</p>
            </div>
          </footer>
    </section>

</body>
</html>