<?php
session_start();   // Inicia la sesión
session_unset();   // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión

// Redirige al índice (index.php)
header("Location: ../index.php");
exit(); // Asegura que no se ejecute código adicional después de la redirección
?>
