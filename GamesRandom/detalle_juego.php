<?php
include('connection.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $mysqli->prepare("SELECT * FROM juegos_fisicos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $juego = $result->fetch_assoc();
    } else {
        echo 'Juego no encontrado';
        exit;
    }
} else {
    echo 'ID no proporcionado';
    exit;
}

$stmt->close();
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($juego['nombre']); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .juego-detalle {
            background-color: #ffffff;
            color: #333;
            border-radius: 10px;
            padding: 20px;
            max-width: 800px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .juego-detalle img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .juego-detalle h1 {
            font-size: 2.5em;
            margin: 20px 0;
        }
        .juego-detalle p {
            font-size: 1.2em;
            line-height: 1.5;
        }
        .precio {
            font-weight: bold;
            font-size: 1.5em;
            margin: 20px 0;
            color: #e74c3c;
        }
        .boton-comprar {
            display: inline-block;
            padding: 15px 30px;
            font-size: 1.2em;
            color: #ffffff;
            background-color: #27ae60;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .boton-comprar:hover {
            background-color: #2ecc71;
        }
    </style>
</head>
<body>

<div class="juego-detalle">
    <img src="<?php echo htmlspecialchars($juego['imagen']); ?>" alt="<?php echo htmlspecialchars($juego['nombre']); ?>">
    <h1><?php echo htmlspecialchars($juego['nombre']); ?></h1>
    <p><?php echo nl2br(htmlspecialchars($juego['descripcion'])); ?></p>
    <p class="precio">$<?php echo htmlspecialchars(number_format($juego['precio'], 2)); ?></p>
    <a href="#" class="boton-comprar">Comprar Juego</a>
</div>

</body>
</html>
