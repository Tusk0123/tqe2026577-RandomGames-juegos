<?php
include('connection.php');
include('check_admin.php');

$id = $_GET['id'];

// Consultar la información de la orden
$query_order = "SELECT * FROM ordenes WHERE id = ?";
$stmt_order = $mysqli->prepare($query_order);
$stmt_order->bind_param('i', $id);
$stmt_order->execute();
$order = $stmt_order->get_result()->fetch_assoc();

// Consultar los detalles actuales de la orden
$query_details = "SELECT * FROM detalle_ordenes WHERE orden_id = ?";
$stmt_details = $mysqli->prepare($query_details);
$stmt_details->bind_param('i', $id);
$stmt_details->execute();
$details = $stmt_details->get_result();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Eliminar los detalles existentes de la orden
    $stmt = $mysqli->prepare("DELETE FROM detalle_ordenes WHERE orden_id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();

    // Insertar los nuevos detalles de la orden
    foreach ($_POST['juegos'] as $index => $juego_id) {
        $cantidad = $_POST['cantidades'][$index];
        $subtotal = $_POST['subtotales'][$index];

        $stmt = $mysqli->prepare("INSERT INTO detalle_ordenes (orden_id, juego_id, cantidad, subtotal) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('iiid', $id, $juego_id, $cantidad, $subtotal);
        $stmt->execute();
    }

    // Actualizar el total de la orden
    $total = $_POST['total'];
    $stmt = $mysqli->prepare("UPDATE ordenes SET total = ? WHERE id = ?");
    $stmt->bind_param('di', $total, $id);

    if ($stmt->execute()) {
        echo "Orden actualizada exitosamente. <a href='crud_order.php'>Volver al listado</a>";
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
    <title>Editar Orden</title>
</head>
<body>
    <h2>Editar Orden</h2>
    <form method="POST" action="">
        <label for="total">Total:</label>
        <input type="number" name="total" step="0.01" value="<?= htmlspecialchars($order['total']) ?>" required><br>

        <h3>Detalles de la Orden</h3>
        <?php while ($row = $details->fetch_assoc()): ?>
            <div>
                <label for="juego_<?= htmlspecialchars($row['id']) ?>">Juego:</label>
                <select name="juegos[]">
                    <?php
                    // Obtener todos los juegos
                    $query_games = "SELECT * FROM juegos_fisicos";
                    $result_games = $mysqli->query($query_games);

                    while ($game = $result_games->fetch_assoc()) {
                        echo '<option value="' . htmlspecialchars($game['id']) . '"' . ($game['id'] == $row['juego_id'] ? ' selected' : '') . '>' . htmlspecialchars($game['nombre']) . '</option>';
                    }
                    ?>
                </select><br>

                <label for="cantidad_<?= htmlspecialchars($row['id']) ?>">Cantidad:</label>
                <input type="number" name="cantidades[]" value="<?= htmlspecialchars($row['cantidad']) ?>" required><br>

                <label for="subtotal_<?= htmlspecialchars($row['id']) ?>">Subtotal:</label>
                <input type="number" name="subtotales[]" step="0.01" value="<?= htmlspecialchars($row['subtotal']) ?>" required><br>
            </div>
        <?php endwhile; ?>

        <button type="submit">Actualizar</button>
    </form>
    <a href="crud_order.php">Volver al listado de órdenes</a>
</body>
</html>
