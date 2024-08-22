<?php
include('connection.php');
include('check_admin.php');

if (!isset($_SESSION['user_id'])) {
    die("ID de usuario no definido en la sesión.");
}

$result = $mysqli->query("SELECT * FROM ordenes");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Órdenes</title>
</head>
<body>
    <h2>Listado de Órdenes</h2>
    <a href="nueva_orden.php">Agregar Nueva Orden</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Total</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['total']) ?></td>
            <td><?= htmlspecialchars($row['fecha']) ?></td>
            <td>
                <a href="editar_orden.php?id=<?= htmlspecialchars($row['id']) ?>">Editar</a>
                <a href="eliminar_orden.php?id=<?= htmlspecialchars($row['id']) ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
