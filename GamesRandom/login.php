<?php
session_start();
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar las credenciales
    $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE username = ? AND password = ?");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $_SESSION['rol'] = $user['rol']; // Asumiendo que hay un campo 'rol' en la tabla 'usuarios'
        $_SESSION['username'] = $user['username'];

        if ($user['rol'] === 'admin') {
            header('Location: admin_dashboard.php');
        } else {
            header('Location: cliente_dashboard.php');
        }
        exit;
    } else {
        $error = "Credenciales incorrectas";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="image-container">
            <img src="imagenes/control.jpg" alt="Image">
        </div>
        <div class="form-container">
            <h2>Iniciar Sesión</h2>
            <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
            <form method="POST" action="">
                <label for="username">Usuario:</label>
                <input type="text" name="username" required>
                
                <label for="password">Contraseña:</label>
                <input type="password" name="password" required>
                
                <button type="submit">Iniciar Sesión</button>
            </form>
            <p>¿No tienes cuenta? <a href="register.php">Regístrate aquí</a></p>
        </div>
    </div>
</body>
</html>

