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

    echo "<h2>MUCHAS GRACIAS</h2>";
    echo "<p>Gracias por entrar al concurso de Tenis Mike \"Chidos mis Tenis\". ";
    echo "Hemos recibido la siguiente información de tu registro:</p>";

    echo "<ul>";
    echo "<li><strong>Nombre:</strong> $nombre</li>";
    echo "<li><strong>Email:</strong> $email</li>";
    echo "<li><strong>Teléfono:</strong> $telefono</li>";
    echo "<li><strong>Tu triste historia:</strong> " . nl2br($razon) . "</li>";
    echo "</ul>";
?>
</body>
</html>