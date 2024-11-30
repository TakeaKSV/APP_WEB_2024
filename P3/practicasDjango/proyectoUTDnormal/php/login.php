<?php
session_start();
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, password, privilegio FROM usuario WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $username;
            $_SESSION['privilegio'] = $user['privilegio'];
            header("Location: ../index.php");
            exit();
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Usuario no encontrado.";
    }
}
$is_logged_in = isset($_SESSION['user_id']);
$privilegio = $_SESSION['privilegio'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | Proyecto UTD</title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="../img/logophp.png" alt="Imagen PHP" title="PHP">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="login.php">Iniciar Sesión</a></li>
            <li><a href="registro.php">Formulario</a></li>
        </ul>
    </nav>
    <section id="content">
       <div class="box">
            <h1>Iniciar Sesión</h1>
            <form method="POST" action="">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Iniciar Sesión</button>
            </form>
            <?php if (isset($error)): ?>
                <div class="alert-warning"><?= $error ?></div>
            <?php endif; ?>
       </div>
    </section>
    <footer>
        <p>Proyecto PHP &copy; <?= date('Y'); ?> | Visitado el: <?= date('d/m/Y'); ?></p>
    </footer>
</body>
</html>
