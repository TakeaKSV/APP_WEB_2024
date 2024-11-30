<?php
include('auth.php');

include('conexion.php');

$sql = "SELECT a.id, a.descripcion, a.pu, a.cantidad, c.descripcion AS categoria, a.imagen, a.fecha_hora
        FROM articulos a
        INNER JOIN categorias c ON a.id_categoria = c.id
        ORDER BY a.id DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artículos | PHP Proyecto UTD</title>
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
            <li><a href="mision.php">Misión</a></li>
            <li><a href="vision.php">Visión</a></li>
            <li><a href="acercade.php">Acerca de</a></li>
            <li><a href="articulo.php">Artículos</a></li>
            <li><a href="categoria.php">Categorías</a></li>
            <li><a href="logout.php">Cerrar sesión</a></li>
        </ul>
    </nav>
    <section id="content">
        <div class="box">
            <h1>Artículos</h1>
            <hr>

            <?php if ($result->num_rows > 0): ?>
                <ul>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <li>
                            <strong>Descripción:</strong> <?= $row['descripcion'] ?><br>
                            <strong>Precio Unitario:</strong> <?= number_format($row['pu'], 2, ',', '.') ?>$<br>
                            <strong>Cantidad:</strong> <?= $row['cantidad'] ?><br>
                            <strong>Categoría:</strong> <?= $row['categoria'] ?><br>
                            <strong>Fecha de Ingreso:</strong> <?= $row['fecha_hora'] ?><br>

                            <!-- Mostrar la imagen -->
                            <?php if ($row['imagen']): ?>
                                <img src="../images/<?= $row['imagen'] ?>" alt="Imagen del artículo" width="150"><br>
                            <?php else: ?>
                                <p>No hay imagen disponible</p>
                            <?php endif; ?>
                        </li>
                        <hr>
                    <?php endwhile; ?>
                </ul>
            <?php else: ?>
                <p>No hay artículos disponibles en la base de datos.</p>
            <?php endif; ?>
        </div>
    </section>
    <footer>
        <p>Curso de PHP con Dagonline &copy; 2024 | Visitado el: <?= date('d/m/Y') ?></p>
    </footer>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>
