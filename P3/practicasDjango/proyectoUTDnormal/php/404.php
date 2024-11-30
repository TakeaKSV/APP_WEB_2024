<?php
http_response_code(404);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404 | Página no encontrada</title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .error-container {
            max-width: 600px;
            margin: 10% auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 3em;
            color: #e74c3c;
        }
        p {
            font-size: 1.2em;
        }
        a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }
        a:hover {
            color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>Error 404</h1>
        <p>Lo sentimos, la página que estás buscando no existe.</p>
        <p>Verifica la URL o regresa a la página de inicio.</p>
        <a href="../index.php">Volver a Inicio</a>
    </div>
</body>
</html>
