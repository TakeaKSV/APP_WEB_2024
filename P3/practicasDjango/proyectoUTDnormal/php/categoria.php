<?php
// Incluye el archivo de protección de la sesión
include('auth.php');

// Incluir la conexión a la base de datos (si es necesario)
include('conexion.php');

// Consulta para obtener las categorías y contar cuántos artículos pertenecen a cada una
$sql = "
    SELECT c.id, c.descripcion, COUNT(a.id) AS cantidad_articulos
    FROM categorias c
    LEFT JOIN articulos a ON a.id_categoria = c.id
    GROUP BY c.id, c.descripcion
";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías | PHP Proyecto UTD</title>
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
            <h1>Categorías</h1>
            <hr>

            <?php if ($result->num_rows > 0): ?>
                <ul>
                    <?php while($categoria = $result->fetch_assoc()): ?>
                        <li>
                            <strong>Descripción:</strong> <?= $categoria['descripcion'] ?><br>
                            <strong>Cantidad de Artículos:</strong> <?= $categoria['cantidad_articulos'] ?>
                        </li>
                        <hr>
                    <?php endwhile; ?>
                </ul>
            <?php else: ?>
                <p>No hay categorías disponibles.</p>
            <?php endif; ?>
        </div>
    </section>
    <footer>
        <p>Curso de PHP con Dagonline &copy; 2024 | Visitado el: <?= date('d/m/Y'); ?></p>
    </footer>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>
