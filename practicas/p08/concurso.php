<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 5</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php
    $nombre = $_POST['username'];
    $email = $_POST['email'];
    $telefono = $_POST['phone'];
    $razon = $_POST['descripcion'];  
    $caractrs = $_POST['caractrs'] ?? []; 
    $color    = $_POST['color'] ?? 'No seleccionado'; 
    $talla = $_POST['talla'];

    echo "<h1>MUCHAS GRACIAS</h1>";
    echo "<p>Gracias por entrar al concurso de Tenis Mike® \"Chidos mis Tenis\". ";
    echo "Hemos recibido la siguiente información de tu registro:</p>";

    echo "<h2>Acerca de ti:</h2>";
    echo "<ul>";
    echo "<li><strong>Nombre:</strong> $nombre</li>";
    echo "<li><strong>Email:</strong> $email</li>";
    echo "<li><strong>Teléfono:</strong> $telefono</li>";
    echo "<li><strong>Tu triste historia:</strong> " . nl2br($razon) . "</li>";
    echo "</ul>";

    echo "<h2>Tu diseño de Tenis (si ganas):</h2>";
    echo "<ul>";
    echo "<li><strong>Color:</strong> $color</li>";

    echo "<li><strong>Características:</strong> ";
    if (!empty($caractrs)) {
    foreach ($caractrs as $c) {
        echo $c . " ";
    }
    } else {
    echo "Ninguna seleccionada";
    }
    echo "</li>";

    echo "<li><strong>Talla:</strong> $talla</li>";
    echo "</ul>";
?>
</body>
</html>