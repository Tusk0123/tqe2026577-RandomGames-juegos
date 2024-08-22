<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Publicación Jurídica</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos CSS personalizados -->
    <link rel="stylesheet" type="text/css" href="../public/style.css">
    <style>
        /* Estilo para ajustar el tamaño de las imágenes del carrusel */
        .carousel-inner img {
            width: 100%; /* Ancho completo */
            height: 400px; /* Altura fija (puedes ajustarla según tus necesidades) */
            object-fit: cover; /* Esto mantiene el aspecto de la imagen mientras llena el contenedor */
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container mt-5">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="9000">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="imagenes/juego.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Srarcraft 2</h5>
                        <p>Gratis</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="imagenes/stray.PNG" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Bienvenido a Legal Vault</h5>
                        <p>Tu mejor aliado para ejercer la abogacía.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="imagenes/diablo.jpeg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Bienvenido a Legal Vault</h5>
                        <p>Tu mejor aliado para ejercer la abogacía.</p>
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    </div>

    <div class="container">
        <?php include 'mostrar_juegos.php'; ?>
    </div>

    <?php include 'footer.php'; ?>
    
    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
