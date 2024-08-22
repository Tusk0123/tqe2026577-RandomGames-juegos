<?php
include('connection.php');
include('check_admin.php');
include('crud_header.php');

$result = $mysqli->query("SELECT * FROM juegos_fisicos");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juegos Físicos</title>
</head>
<body>
    <h2>Listado de Juegos Físicos</h2>
    <a href="nuevo_juego.php">Agregar Nuevo Juego</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['nombre']) ?></td>
            <td><?= htmlspecialchars($row['descripcion']) ?></td>
            <td><?= htmlspecialchars($row['precio']) ?></td>
            <td>
                <img src="<?= htmlspecialchars($row['imagen']) ?>" alt="Imagen de <?= htmlspecialchars($row['nombre']) ?>" width="100">
            </td>
            <td>
                <a href="editar_juego.php?id=<?= htmlspecialchars($row['id']) ?>">Editar</a>
                <a href="eliminar_juego.php?id=<?= htmlspecialchars($row['id']) ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
