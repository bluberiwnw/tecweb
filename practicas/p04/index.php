<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 4</title>
</head>
<body>

    <H1>Práctica 4</H1>


    <h2>Ejercicio 1</h2>
    <?php
        echo '<h4>Respuesta:</h4>';   
        echo '<ul>';
        echo '<li>$_myvar es válida porque inicia con guión bajo.</li>';
        echo '<li>$_7var es válida porque inicia con guión bajo.</li>';
        echo '<li>myvar es inválida porque no tiene el signo de dolar ($).</li>';
        echo '<li>$myvar es válida porque inicia con una letra.</li>';
        echo '<li>$var7 es válida porque inicia con una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
        echo '<li>$house*5 es inválida porque el símbolo * no está permitido.</li>';
        echo '</ul>';
    ?>

    <h2>Ejercicio 2</h2>
    <?php
    $a = 'ManejadorSQL';
    $b = 'MySQL';
    $c = &$a;

    echo '<h4>Respuesta a.:</h4>';
    echo "a = $a<br>";
    echo "b = $b<br>";
    echo "c = $c<br>";

    $a = 'PHP server';
    $b = &$a; // reasignación por referencia

    echo '<h4>Respuesta b.:</h4>';
    echo "a = $a<br>";
    echo "b = $b<br>";
    echo "c = $c<br>";
    ?>

    <h2>Ejercicio 3</h2>
    <p>Muestra el contenido de cada variable inmediatamente después de cada asignación,
    verificar la evolución del tipo de estas variables (imprime todos los componentes de los
    arreglo):</p>

    <?php
    echo '<p>$a = "PHP5";</p>';
    echo '<p>$z[] = &$a;</p>';
    echo '<p>$b = "5a version de PHP"</p>';
    echo '<p>$c = $b*10;</p>';

    echo '<p>a. Ahora muestra el contenido de cada variable</p>';

    $a = 'PHP5';
    $z = [];          
    $z[] = &$a;
    $b = '5a version de PHP';
    $c = (int)$b * 10;   

    echo '<h4>Respuesta:</h4>';
    echo "a = $a<br>";
    echo "b = $b<br>";
    echo "c = $c<br>";
    echo "z = "; print_r($z); echo "<br>";

    echo '<p>b. Agrega al código actual lo siguiente:</p>';
    echo '<p>$a .= $b;</p>';
    echo '<p>$b *= $c;</p>';
    echo '<p>z[0] = "MYSQL";</p>';

    $a .= $b;
    $b = (int)$b * $c;   
    $z[0] = 'MySQL';

    echo '<h4>Respuesta:</h4>';
    echo "a = $a<br>";
    echo "b = $b<br>";
    echo "c = $c<br>";
    echo "z = "; print_r($z); echo "<br>";
    ?>


    <h2>Ejercicio 4</h2>
    <?php
    $a = 'PHP5';
    $z = [];
    $z[] = &$a;
    $b = '5';
    $c = $b * 10;
    $a .= $b;
    $b *= $c;
    $z[0] = 'MySQL';

    echo '<h4>Respuesta:</h4>';
    echo "a = " . $GLOBALS['a'] . "<br>";
    echo "b = " . $GLOBALS['b'] . "<br>";
    echo "c = " . $GLOBALS['c'] . "<br>";
    echo "z = "; print_r($GLOBALS['z']); echo "<br>";
    ?>

    <h2>Ejercicio 5</h2>
    <?php
    $a = "7 personas";
    $b = (int)$a;
    $a = "9E3";     
    $c = (double)$a;

    echo '<h4>Respuesta:</h4>';
    echo "a = $a<br>";
    echo "b = $b<br>";
    echo "c = $c<br>";
    ?>

    <h2>Ejercicio 6</h2>
    <?php
    $a = "0";      
    $b = "TRUE";   
    $c = false;    

    $d = ($a || $b);  
    $e = ($a && $c);
    $f = ($a xor (bool)$b); 

    echo '<h4>Respuesta:</h4>';
    var_dump($a, $b, $c, $d, $e, $f);

    echo "<br>";
    echo "c = " . (int)$c . "<br>"; 
    echo "e = " . (int)$e . "<br>";
    ?>

    <h2>Ejercicio 7</h2>
    <?php
    echo '<h4>Respuesta:</h4>';
    echo "Versión de PHP: " . phpversion() . "<br>";
    echo "Software del servidor (Apache): " . ($_SERVER['SERVER_SOFTWARE'] ?? 'No disponible') . "<br>";
    echo "Sistema operativo del servidor: " . PHP_OS . "<br>";
    echo "Idioma del navegador: " . ($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'No disponible') . "<br>";
    ?>

    <footer>
        <p>
        <a href="https://validator.w3.org/check?uri=referer">
        <img src="https://www.w3.org/Icons/valid-xhtml11" alt="XHTML 1.1" válido alto="31" ancho="88" /></a>
    </p>
    </footer>
</body>
</html>
