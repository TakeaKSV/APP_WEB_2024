<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $privilegio = $_POST['privilegio'];

    $sql_check = "SELECT id FROM usuario WHERE username = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param('s', $username);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        $error = "El usuario ya existe.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO usuario (username, password, privilegio) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $username, $hashed_password, $privilegio);
        if ($stmt->execute()) {
            $success = "Usuario registrado correctamente.";
        } else {
            $error = "Error al registrar usuario.";
        }
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
    <title>Registro | Proyecto UTD</title>
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
            <h1>Registrar Usuario</h1>
            <form method="POST" action="">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                <label for="privilegio">Privilegio:</label>
                <select id="privilegio" name="privilegio" required>
                    <option value="user">Usuario</option>
                    <option value="admin">Administrador</option>
                </select>
                <button type="submit">Registrar</button>
            </form>
            <?php if (isset($success)): ?>
                <div class="alert-success"><?= $success ?></div>
            <?php elseif (isset($error)): ?>
                <div class="alert-warning"><?= $error ?></div>
            <?php endif; ?>
       </div>
    </section>
    <footer>
        <p>Proyecto PHP &copy; <?= date('Y'); ?> | Visitado el: <?= date('d/m/Y'); ?></p>
    </footer>
</body>
</html>
