<?php
include('auth.php')
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Inicio|PHP Proyecto UTD
    </title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="../img/logophp.png" alt="Imagen Django" title="Django">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="../index.php" >Inicio</a></li>
            <li><a href="mision.php">Misión</a></li>
            <li><a href="vision.php">Visión</a></li>
            <li><a href="acercade.php">Acerca de</a></li>
            <li><a href="articulo.php">Articulos</a></li>
            <li><a href="categoria.php">Categorias</a></li>
            <li><a href="logout.php">Cerrar sesion</a></li>
        </ul>
    </nav>
    <section id="content">
       <div class="box">
            <h1>Acerca de Nosotros</h1>
            <hr>
            <p>Somos un equipo destinado al desarrollo de SW</p>
       </div>
    </section>
    <footer>
        <p>Curso de PHP con Dagonline &copy; 2024 | Visitado el: 01/10/24</p>
    </footer>
</body>
</html>