<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $orden_id = $_POST['orden_id'];
    $total = $_POST['total'];

    $stmt = $mysqli->prepare("UPDATE ordenes SET total = ? WHERE id = ?");
    $stmt->bind_param("di", $total, $orden_id);
    $stmt->execute();
    $stmt->close();

    header("Location: read_orders.php");
}
?>
