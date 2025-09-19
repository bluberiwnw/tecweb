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

    <h2>Ejercicio 2</h2>
    <p>Crear programar para generar números y obtener secuencia impar, par, impar</p>
    <form action="http://localhost:8080/tecweb/practicas/p06/index.php" method="get">
        <input type="hidden" name="ej2" value="1">
        <input type="submit" value="Generar">
    </form>

    <?php
    if (isset($_GET['ej2'])) {
        echo generarSecuencia();
    }
    ?>

     <h2>Ejercicio 3</h2>
    <p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente, pero que además sea múltiplo de un número dado.</p>
    <form action="http://localhost:8080/tecweb/practicas/p06/index.php" method="get">
        Número divisor: <input type="text" name="divisor">
        <input type="submit" value="Buscar con while">
    </form>

    <?php
    if (isset($_GET['divisor'])) {
        echo buscarMultiploWhile($_GET['divisor']);
        echo "<br><br>";
        echo buscarMultiploDoWhile($_GET['divisor']);
    }
    ?>
    

    <h2>Ejercicio 4</h2>
    <p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente, pero que además sea múltiplo de un número dado.</p>
    <form action="index.php" method="get">
        <input type="hidden" name="ej4" value="1">
        <input type="submit" value="Mostrar tabla">
    </form>

    <?php
    if (isset($_GET['ej4'])) {
        echo mostrarTablaAscii();
    }
    ?>
</body>
</html>