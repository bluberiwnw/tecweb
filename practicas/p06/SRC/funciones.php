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

?>
