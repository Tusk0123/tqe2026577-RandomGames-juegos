<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rol = $_POST['rol']; // 'admin' o 'cliente'

    // Insertar nuevo usuario en la base de datos
    $stmt = $mysqli->prepare("INSERT INTO usuarios (username, password, rol) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $username, $password, $rol);

    if ($stmt->execute()) {
        echo "Usuario registrado exitosamente. <a href='login.php'>Iniciar sesión</a>";
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
    <title>Registro</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<?php // include 'header.php'; ?>

<div class="container">
    <div class="image-container">
        <img src="imagenes/control.jpg" alt="Image">
    </div>
    <div class="form-container">
        <h2>Registro de Usuario</h2>
        <form method="POST" action="">
            <label for="username">Usuario:</label>
            <input type="text" name="username" required>
            
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
            
            <label for="rol">Rol:</label>
            <select name="rol" required>
                <option value="cliente">Cliente</option>
                <option value="admin">Admin</option>
            </select>
            
            <button type="submit">Registrarse</button>
        </form>
    </div>
</div>

<?php // include 'footer.php'; ?>

</body>
</html>
