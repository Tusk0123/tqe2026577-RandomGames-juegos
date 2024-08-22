<?php
include('connection.php');
include('check_admin.php');

$id = $_GET['id'];
$result = $mysqli->query("SELECT * FROM juegos_fisicos WHERE id = $id");
$juego = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    // Manejo de la imagen
    $imagen = $juego['imagen']; // Mantener la imagen actual si no se sube una nueva
    if (!empty($_FILES['imagen']['name'])) {
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
            $imagen = $ruta_imagen;
        } else {
            echo "Error al subir la imagen.";
        }
    }

    // Actualizar el juego
    $stmt = $mysqli->prepare("UPDATE juegos_fisicos SET nombre = ?, descripcion = ?, precio = ?, imagen = ? WHERE id = ?");
    $stmt->bind_param('ssdsi', $nombre, $descripcion, $precio, $imagen, $id);

    if ($stmt->execute()) {
        echo "Juego actualizado exitosamente. <a href='juegos_fisicos.php'>Volver al listado</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Juego</title>
</head>
<body>
    <h2>Editar Juego</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($juego['nombre']) ?>" required><br>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required><?= htmlspecialchars($juego['descripcion']) ?></textarea><br>
        
        <label for="precio">Precio:</label>
        <input type="number" name="precio" step="0.01" value="<?= htmlspecialchars($juego['precio']) ?>" required><br>
        
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" accept="image/*"><br>
        <!-- Mostrar la imagen actual -->
        <?php if ($juego['imagen']): ?>
            <img src="<?= htmlspecialchars($juego['imagen']) ?>" alt="Imagen de <?= htmlspecialchars($juego['nombre']) ?>" width="100"><br>
        <?php endif; ?>
        
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
