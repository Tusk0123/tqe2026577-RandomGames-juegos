<?php
include('connection.php');
include('check_admin.php');

$id = $_GET['id'];

// Eliminar los detalles de la orden primero
$stmt = $mysqli->prepare("DELETE FROM detalle_ordenes WHERE orden_id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->close();

// Eliminar la orden
$stmt = $mysqli->prepare("DELETE FROM ordenes WHERE id = ?");
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    echo "Orden eliminada exitosamente. <a href='crud_order.php'>Volver al listado</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
?>
