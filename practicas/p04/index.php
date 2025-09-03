<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 4</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    <?php
        //AQUI VA MI CÓDIGO PHP
        $_myvar;
        $_7var;
        //myvar;       // Inválida
        $myvar;
        $var7;
        $_element1;
        //$house*5;     // Invalida
        
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
    <p>Proporcionar los valores de $a, $b, $c como sigue:</p>

    <?php
    echo '<p>$a = "ManejadorSQL";</p>';
    echo '<p>$b = "MySQL";</p>';
    echo '<p>$c = &$a;</p>';

    echo '<p>a. Ahora muestra el contenido de cada variable</p>';

    
    $a = 'ManejadorSQL';
    $b = 'MySQL';
    $c = &$a;

    echo '<h4>Respuesta:</h4>';

    print($a);
    echo "<br>";
    print($b);
    echo "<br>";
    print($c);
    

     echo '<p>b. Agrega al código actual las siguientes asignaciones:</p>';
     echo '<p>$a = “PHP server”;</p>';
     echo '<p>$b = &$a;</p>';
    

    /*$a = 'ManejadorSQL';
    $b = 'MySQL';*/
    $c = &$a;
    $a = 'PHP server';
    $b = &$a;

    echo '<h4>Respuesta:</h4>';

    print($a);
    echo "<br>";
    print($b);
    echo "<br>";
    print($c);
    ?>

    <h2>Ejercicio 3</h2>
    <p>Muestra el contenido de cada variable inmediatamente después de cada asignación,
    verificar la evolución del tipo de estas variables (imprime todos los componentes de los
    arreglo):</p>

    <?php
    echo '<p>$a = “PHP5”;</p>';
    echo '<p>$z[] = &$a;</p>';
    echo '<p>$b = "5a version de PHP"</p>';
    echo '<p>$c = $b*10;</p>';
    


    echo '<p>a. Ahora muestra el contenido de cada variable</p>';

    
    $a = 'PHP5';
    $z[] = &$a;
    $b = '5a version de PHP';
    $c = $b*10; 

    echo '<h4>Respuesta:</h4>';

    print($a);
    echo "<br>";
    print($b);
    echo "<br>";
    print($c);
    echo "<br>";
    print_r($z);
    

    echo '<p>b. Agrega al código actual lo siguiente:</p>';
    echo '<p>$a .= $b;</p>';
    echo '<p>$b *= $c;</p>';
    echo '<p>z[0] = "MYSQL";</p>';
    

    /*$a = 'ManejadorSQL';
    $b = 'MySQL';*/
    $a .= $b;
    $b *= $c;
    $z[0] = 'MySQL';

    echo '<h4>Respuesta:</h4>';

    print($a);
    echo "<br>";
    print($b);
    echo "<br>";
    print($c);
    echo "<br>";
    print_r($z);
    ?>

    <h2>Ejercicio 4</h2>
    <p>Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de
    la matriz <b>$GLOBALS</b> o del modificador <b>global</b> de PHP.</p>

    <?php
    $a = 'PHP5';
    $z[] = &$a;
    $b = '5a version de PHP';
    $c = $b*10;
    $a .= $b;
    $b *= $c;
    $z[0] = 'MySQL';

    echo '<h4>Respuesta:</h4>';
    echo "a = " . $GLOBALS['a'] . "<br>";
    echo "b = " . $GLOBALS['b'] . "<br>";
    echo "c = " . $GLOBALS['c'] . "<br>";
    echo "z = ";
    print_r($GLOBALS['z']);
    ?>

    <h2>Ejercicio 5</h2>
    <p>Dar el valor de las variables $a, $b, $c al final del siguiente script:</p>
    <p>$a = "7 personas";</p>
    <p>$b = (integer) $a;</p>
    <p>$a = "9E3";</p>
    <p>$c = (double) $a;</p>


    <?php
    $a = "7 personas";
    $b = (integer) $a;
    $a = "9E3";
    $c = (double) $a;

    echo '<h4>Respuesta:</h4>';
    echo "a = $a<br>";
    echo "b = $b<br>";
    echo "c = $c<br>";
    ?>

</body>
</html>