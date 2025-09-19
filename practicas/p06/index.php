<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 6</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>

    <h2>Ejemplo de POST</h2>
    <form action="http://localhost:8080/tecweb/practicas/p06/index.php" method="post">
        Name: <input type="text" name="name"><br><br>
        E-mail: <input type="text" name="email"><br><br>
        <input type="submit">
    </form>
    <br>

    <?php
    include 'SRC/funciones.php';

    if (isset($_GET['numero'])) {
    $num = $_GET['numero'];
    echo Multiplo5y7($num);  
    }
    ?>
    
</body>
</html>