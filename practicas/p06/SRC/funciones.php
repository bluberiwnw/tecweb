<?php
function Multiplo5y7($num) {
    if ($num % 5 == 0 && $num % 7 == 0) {
        return '<h3>R= El número ' . $num . ' SÍ es múltiplo de 5 y 7.</h3>';
    } else {
        return '<h3>R= El número ' . $num . ' NO es múltiplo de 5 y 7.</h3>';
    }
}

function mostrarDatosPost($name, $email) {
    return $name . '<br>' . $email;
}

function generarSecuencia() {
    $matriz = []; 
    $iteraciones = 0;
    $encontrado = false;

    while (!$encontrado) {
        $iteraciones++;
        $fila = [
            rand(1, 1000),
            rand(1, 1000),
            rand(1, 1000)
        ];
        $matriz[] = $fila;

        if ($fila[0] % 2 != 0 && $fila[1] % 2 == 0 && $fila[2] % 2 != 0) {
            $encontrado = true;
        }
    }

    echo "<h3>Matriz generada:</h3>";
    foreach ($matriz as $fila) {
        echo implode(", ", $fila) . "<br>";
    }

    $totalNumeros = $iteraciones * 3;
    echo "<p><strong>$totalNumeros</strong> números obtenidos en <strong>$iteraciones</strong> iteraciones.</p>";
}

function buscarMultiploWhile($divisor) {
    $num = 0; $intentos = 0;
    while (true) {
        $num = rand(1,1000);
        $intentos++;
        if ($num % $divisor == 0) break;
    }
    return "Con while: Se encontró $num múltiplo de $divisor en $intentos intentos.";
}

function buscarMultiploDoWhile($divisor) {
    $num = 0; $intentos = 0;
    do {
        $num = rand(1,1000);
        $intentos++;
    } while($num % $divisor != 0);
    return "Con do-while: Se encontró $num múltiplo de $divisor en $intentos intentos.";
}

function mostrarTablaAscii() {
    $arr = [];
    for ($i=97; $i<=122; $i++) {
        $arr[$i] = chr($i);
    }
    $juntar = "<table border='1'><tr><th>Código</th><th>Letra</th></tr>";
    foreach ($arr as $key=>$val) {
        $juntar .= "<tr><td>$key</td><td>$val</td></tr>";
    }
    $juntar .= "</table>";
    return $juntar;
}


?>
