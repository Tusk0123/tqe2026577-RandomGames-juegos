
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Conexión a la base de datos
$databaseHost = 'localhost';
$databaseName = 'juegosdb';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}
?>