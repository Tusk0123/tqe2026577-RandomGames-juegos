<?php
session_start();
include('connection.php');

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] === 'admin') {
        header('Location: admin_dashboard.php');
        exit;
    } else {
        header('Location: cliente_dashboard.php');
        exit;
    }
} else {
    header('Location: login.php');
    exit;
}

// Guardar juegos (Solo si el usuario es admin y se envía un formulario POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['rol'] === 'admin') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    // Insertar el juego en la base de datos
    $stmt = $mysqli->prepare("INSERT INTO juegos_fisicos (nombre, descripcion, precio) VALUES (?, ?, ?)");
    $stmt->bind_param('ssd', $nombre, $descripcion, $precio);

    if ($stmt->execute()) {
        echo "Juego agregado exitosamente.";
    } else {
        echo "Error al agregar el juego: " . $stmt->error;
    }

    $stmt->close();
}
?>

<?php include('header.php'); ?>

<h2>Agregar Nuevo Juego</h2>

<!-- Formulario para agregar juegos -->
<?php if ($_SESSION['rol'] === 'admin') : ?>
    <form method="POST" action="index.php">
        <label for="nombre">Nombre del Juego:</label>
        <input type="text" name="nombre" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required></textarea><br>

        <label for="precio">Precio:</label>
        <input type="number" step="0.01" name="precio" required><br>

        <button type="submit">Agregar Juego</button>
    </form>
<?php else: ?>
    <p>No tienes permisos para agregar juegos.</p>
<?php endif; ?>

<?php include('footer.php'); ?>
