<?php
include('connection.php');

// Consulta para obtener todos los juegos
$query = 'SELECT * FROM juegos_fisicos';
$result = $mysqli->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Juegos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .juegos-lista {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .juego-card {
            background-color: #333;
            color: #fff;
            border-radius: 10px;
            width: 300px;
            margin: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s;
            position: relative;
            overflow: hidden;
        }
        .juego-card:hover {
            transform: scale(1.05);
        }
        .juego-card img {
            width: 100%;
            height: auto;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .juego-card h3 {
            margin: 10px;
            font-size: 1.5em;
        }
        .juego-card p {
            margin: 10px;
            font-size: 1em;
        }
        .juego-card .precio {
            margin: 10px;
            font-weight: bold;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <h2>Lista de Juegos</h2>
    <div class="juegos-lista">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="juego-card">';
                echo '<a href="detalle_juego.php?id=' . intval($row['id']) . '">';
                echo '<img src="' . htmlspecialchars($row['imagen']) . '" alt="' . htmlspecialchars($row['nombre']) . '">';
                echo '<h3>' . htmlspecialchars($row['nombre']) . '</h3>';
                echo '</a>';
                echo '<p class="precio">$' . htmlspecialchars($row['precio']) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No se encontraron juegos.</p>';
        }

        // Cerrar la conexión
        $mysqli->close();
        ?>
    </div>
</body>
</html>
