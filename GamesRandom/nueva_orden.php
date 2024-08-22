<?php
include('connection.php');
include('check_admin.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $total = $_POST['total'];
    $usuario_id = $_SESSION['user_id'];

    // Insertar la nueva orden
    $stmt = $mysqli->prepare("INSERT INTO ordenes (usuario_id, total) VALUES (?, ?)");
    $stmt->bind_param('id', $usuario_id, $total);

    if ($stmt->execute()) {
        echo "Orden agregada exitosamente. <a href='crud_order.php'>Volver al listado</a>";
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
    <title>Agregar Nueva Orden</title>
</head>
<body>
    <h2>Agregar Nueva Orden</h2>
    <form method="POST" action="">
        <label for="total">Total:</label>
        <input type="number" name="total" step="0.01" required><br>
        <button type="submit">Agregar</button>
    </form>
</body>
</html>
