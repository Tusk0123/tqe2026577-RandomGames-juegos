<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $orden_id = $_GET['id'];

    // Eliminar detalles de la orden
    $stmt = $mysqli->prepare("DELETE FROM detalle_ordenes WHERE orden_id = ?");
    $stmt->bind_param("i", $orden_id);
    $stmt->execute();
    $stmt->close();

    // Eliminar la orden
    $stmt = $mysqli->prepare("DELETE FROM ordenes WHERE id = ?");
    $stmt->bind_param("i", $orden_id);
    $stmt->execute();
    $stmt->close();

    header("Location: read_orders.php");
}
?>
