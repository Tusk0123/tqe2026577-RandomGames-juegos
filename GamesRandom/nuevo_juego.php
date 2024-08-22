<?php
include('connection.php');
include('check_admin.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    // Manejo de la imagen
    $imagen = $_FILES['imagen']['name'];
    $imagen_temp = $_FILES['imagen']['tmp_name'];
    $directorio_imagenes = 'imagenes/'; // Carpeta donde se guardarán las imágenes

    // Asegurarse de que el directorio existe
    if (!is_dir($directorio_imagenes)) {
        mkdir($directorio_imagenes, 0777, true);
    }

    $ruta_imagen = $directorio_imagenes . basename($imagen);

    // Mover el archivo de imagen al servidor
    if (move_uploaded_file($imagen_temp, $ruta_imagen)) {
        $stmt = $mysqli->prepare("INSERT INTO juegos_fisicos (nombre, descripcion, precio, imagen) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssds', $nombre, $descripcion, $precio, $ruta_imagen);

        if ($stmt->execute()) {
            echo "Juego agregado exitosamente. <a href='juegos_fisicos.php'>Volver al listado</a>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error al subir la imagen.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Nuevo Juego</title>
</head>
<body>
    <h2>Agregar Nuevo Juego</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required></textarea><br>
        
        <label for="precio">Precio:</label>
        <input type="number" name="precio" step="0.01" required><br>
        
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" accept="image/*" required><br>
        
        <button type="submit">Agregar</button>
    </form>
</body>
</html>

