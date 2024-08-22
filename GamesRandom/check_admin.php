<?php
// check_admin.php

// Iniciar la sesión si no ha sido iniciada ya
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario ha iniciado sesión y es un administrador
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    // Si no es administrador o no ha iniciado sesión, redirigir al login
    header('Location: login.php');
    exit;
}
?>
