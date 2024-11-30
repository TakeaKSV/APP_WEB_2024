<?php
session_start();

$is_logged_in = isset($_SESSION['user_id']);
$privilegio = $_SESSION['privilegio'] ?? null; // Obtén el privilegio del usuario si está autenticado

// Verifica si el usuario está autenticado y tiene un nombre de usuario almacenado en la sesión
$username = $_SESSION['username'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Proyecto UTD</title>
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="img/logophp.png" alt="Imagen PHP" title="PHP">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <?php if (!$is_logged_in): ?>
                <li><a href="php/login.php">Iniciar Sesión</a></li>
                <li><a href="php/registro.php">Formulario</a></li>
            <?php else: ?>
                <?php if ($privilegio === 'admin'): ?>
                    <li><a href="admin_dashboard.php">Panel Admin</a></li>
                <?php endif; ?>
                <li><a href="php/mision.php">Misión</a></li>
                <li><a href="php/vision.php">Visión</a></li>
                <li><a href="php/acercade.php">Acerca de</a></li>
                <li><a href="php/articulo.php">Articulos</a></li>
                <li><a href="php/categoria.php">Categorias</a></li>
                <li><a href="php/logout.php">Cerrar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <section id="content">
       <div class="box">
            <h1>Inicio</h1>
            <hr>
            <?php if ($is_logged_in): ?>
                <p>¡Bienvenido, <?= htmlspecialchars($username) ?>@gmail.com!</p>
            <?php else: ?>
                <p>.:: ¡Bienvenido a mi página de Inicio! ::.</p>
            <?php endif; ?>
       </div>
    </section>
    <footer>
        <p>Proyecto PHP &copy; <?= date('Y'); ?> | Visitado el: <?= date('d/m/Y'); ?></p>
    </footer>
</body>
</html>
