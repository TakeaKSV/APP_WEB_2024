<?php
// Verifica si la sesión ya está iniciada, si no, la inicia
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Si no está logueado, redirige a la página de login
    header("Location: login.php");
    exit();
}
?>
