<?php
include('connection.php');
include('check_admin.php');

$id = $_GET['id'];

$stmt = $mysqli->prepare("DELETE FROM juegos_fisicos WHERE id = ?");
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    echo "Juego eliminado exitosamente. <a href='juegos_fisicos.php'>Volver al listado</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
?>
