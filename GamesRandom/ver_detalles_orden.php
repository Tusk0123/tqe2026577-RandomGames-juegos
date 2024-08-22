<?php
include('connection.php');
include('check_admin.php');

$id = $_GET['id'];

// Consultar detalles de la orden
$query = "SELECT * FROM detalle_ordenes WHERE orden_id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

// Consultar la información de la orden
$query_order = "SELECT * FROM ordenes WHERE id = ?";
$stmt_order = $mysqli->prepare($query_order);
$stmt_order->bind_param('i', $id);
$stmt_order->execute();
$order = $stmt_order->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles de la Orden</title>
</head>
<body>
    <h2>Detalles de la Orden</h2>
    <p>ID de Orden: <?= htmlspecialchars($order['id']) ?></p>
    <p>Total: <?= htmlspecialchars($order['total']) ?></p>
    <p>Fecha: <?= htmlspecialchars($order['fecha']) ?></p>

    <h3>Detalles de los Productos</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Juego</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td>
                <?php
                // Obtener el nombre del juego
                $query_game = "SELECT nombre FROM juegos_fisicos WHERE id = ?";
                $stmt_game = $mysqli->prepare($query_game);
                $stmt_game->bind_param('i', $row['juego_id']);
                $stmt_game->execute();
                $game = $stmt_game->get_result()->fetch_assoc();
                echo htmlspecialchars($game['nombre']);
                ?>
            </td>
            <td><?= htmlspecialchars($row['cantidad']) ?></td>
            <td><?= htmlspecialchars($row['subtotal']) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <a href="crud_order.php">Volver al listado de órdenes</a>
</body>
</html>
