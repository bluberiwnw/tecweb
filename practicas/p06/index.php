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
    <p>Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la ‘a’ a la ‘z’.</p>
    <form action="http://localhost:8080/tecweb/practicas/p06/index.php" method="get">
        <input type="hidden" name="ej4" value="1">
        <input type="submit" value="Mostrar tabla">
    </form>

    <?php
    if (isset($_GET['ej4'])) {
        echo mostrarTablaAscii();
    }
    ?>

    <h2>Ejercicio 5</h2>
    <p>Usar las variables $edad y $sexo en una instrucción if para identificar una persona de sexo “femenino”, cuya edad oscile entre los 18 y 35 años y mostrar un mensaje de bienvenida apropiado.</p>
    <form action="http://localhost:8080/tecweb/practicas/p06/resultado_ej5.php" method="post">
        Edad: <input type="number" name="edad" required><br>
        Sexo: 
        <select name="sexo" required>
            <option value="femenino">Femenino</option>
            <option value="masculino">Masculino</option>
        </select><br>
        <input type="submit" value="Verificar">
    </form>

    <h2>Ejercicio 6</h2>
    <p>Consulta de parque vehicular</p>
    <form action="http://localhost:8080/tecweb/practicas/p06/resultado_ej6.php" method="get">
        Matrícula: <input type="text" name="matricula" required>
        <input type="submit" name="buscar" value="Buscar">
    </form>

    <form action="http://localhost:8080/tecweb/practicas/p06/resultado_ej6.php" method="get">
        <input type="hidden" name="accion" value="mostrar_todo">
        <input type="submit" value="Mostrar todos los autos">
    </form>

    <?php
    if (isset($_GET['buscar'])) {
    $matricula = $_GET['matricula'];
    echo buscarAuto($matricula);
    } elseif (isset($_GET['accion']) && $_GET['accion'] === 'mostrar_todo') {
    echo mostrarAutos();
    } else {
    echo "<p>No se recibió ninguna acción.</p>";
    }
?>
</body>
</html>