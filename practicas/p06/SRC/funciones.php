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

function verificarEdadSexo($edad, $sexo) {
    if ($sexo == "femenino" && $edad >= 18 && $edad <= 35) {
        return "<p style='color:green;'>Bienvenida, usted está en el rango de edad permitido.</p>";
    } else {
        return "<p style='color:red;'>Lo sentimos, no cumple con el rango de edad o sexo requerido.</p>";
    }
}


function obtenerAutos() {
    return [
        "ABC1234" => [
        "Auto"=>["marca"=>"HONDA","modelo"=>2020,"tipo"=>"camioneta"],
        "Propietario"=>["nombre"=>"Ana López","ciudad"=>"Puebla","direccion"=>"Centro"]
    ],
    "XYZ5678" => [
        "Auto"=>["marca"=>"MAZDA","modelo"=>2019,"tipo"=>"sedan"],
        "Propietario"=>["nombre"=>"Carlos Ruiz","ciudad"=>"Cholula","direccion"=>"Av. Hidalgo"]
    ],
    "JKL9101" => [
        "Auto"=>["marca"=>"NISSAN","modelo"=>2021,"tipo"=>"hatchback"],
        "Propietario"=>["nombre"=>"Marta Pérez","ciudad"=>"Atlixco","direccion"=>"Av. Reforma"]
    ],
    "LMN2345" => [
        "Auto"=>["marca"=>"TOYOTA","modelo"=>2018,"tipo"=>"sedan"],
        "Propietario"=>["nombre"=>"Luis Hernández","ciudad"=>"San Martín Texmelucan","direccion"=>"Calle Morelos 12"]
    ],
    "OPQ6789" => [
        "Auto"=>["marca"=>"CHEVROLET","modelo"=>2022,"tipo"=>"camioneta"],
        "Propietario"=>["nombre"=>"Fernanda Gómez","ciudad"=>"Tehuacán","direccion"=>"Col. La Purísima"]
    ],
    "RST1122" => [
        "Auto"=>["marca"=>"FORD","modelo"=>2017,"tipo"=>"sedan"],
        "Propietario"=>["nombre"=>"Diego Martínez","ciudad"=>"Puebla","direccion"=>"Lomas de Angelópolis"]
    ],
    "UVW3344" => [
        "Auto"=>["marca"=>"VOLKSWAGEN","modelo"=>2020,"tipo"=>"hatchback"],
        "Propietario"=>["nombre"=>"Sofía Ramírez","ciudad"=>"Cholula","direccion"=>"Barrio de Santiago"]
    ],
    "DEF5566" => [
        "Auto"=>["marca"=>"KIA","modelo"=>2021,"tipo"=>"camioneta"],
        "Propietario"=>["nombre"=>"Hugo Torres","ciudad"=>"Puebla","direccion"=>"Col. El Carmen"]
    ],
    "GHI7788" => [
        "Auto"=>["marca"=>"HYUNDAI","modelo"=>2019,"tipo"=>"sedan"],
        "Propietario"=>["nombre"=>"Elena Morales","ciudad"=>"Atlixco","direccion"=>"Col. Vista Hermosa"]
    ],
    "JKM9900" => [
        "Auto"=>["marca"=>"MITSUBISHI","modelo"=>2022,"tipo"=>"camioneta"],
        "Propietario"=>["nombre"=>"Ricardo Sánchez","ciudad"=>"Puebla","direccion"=>"Col. Bugambilias"]
    ],
    "NOP1357" => [
        "Auto"=>["marca"=>"PEUGEOT","modelo"=>2018,"tipo"=>"sedan"],
        "Propietario"=>["nombre"=>"Gabriela Díaz","ciudad"=>"Teziutlán","direccion"=>"Av. Juárez"]
    ],
    "QRS2468" => [
        "Auto"=>["marca"=>"BMW","modelo"=>2021,"tipo"=>"sedan"],
        "Propietario"=>["nombre"=>"Alejandro Castillo","ciudad"=>"Puebla","direccion"=>"La Paz"]
    ],
    "TUV3579" => [
        "Auto"=>["marca"=>"AUDI","modelo"=>2020,"tipo"=>"hatchback"],
        "Propietario"=>["nombre"=>"María Fernanda Ortega","ciudad"=>"San Andrés Cholula","direccion"=>"Camino Real"]
    ],
    "WXY4680" => [
        "Auto"=>["marca"=>"MERCEDES","modelo"=>2019,"tipo"=>"camioneta"],
        "Propietario"=>["nombre"=>"Juan Pablo Reyes","ciudad"=>"Tehuacán","direccion"=>"Col. San Rafael"]
    ],
    "ZAB5791" => [
        "Auto"=>["marca"=>"TESLA","modelo"=>2022,"tipo"=>"sedan"],
        "Propietario"=>["nombre"=>"Patricia Mendoza","ciudad"=>"Puebla","direccion"=>"Zona Centro"]
    ]
];
}

function buscarAuto($matricula) {
    $autos = obtenerAutos();
    $matricula = strtoupper(trim($matricula));

    if (isset($autos[$matricula])) {
        $r = $autos[$matricula];
        return "<h3>Matrícula: $matricula</h3>
                <p>Marca: {$r['Auto']['marca']}<br>
                Modelo: {$r['Auto']['modelo']}<br>
                Tipo: {$r['Auto']['tipo']}<br>
                Propietario: {$r['Propietario']['nombre']}<br>
                Ciudad: {$r['Propietario']['ciudad']}<br>
                Dirección: {$r['Propietario']['direccion']}</p>";
    } else {
        return "<p style='color:red;'>No existe un auto con la matrícula $matricula</p>";
    }
}

function mostrarAutos() {
    $autos = obtenerAutos();
    $tabla = "<table border='1'><tr><th>Matrícula</th><th>Marca</th><th>Modelo</th><th>Tipo</th><th>Propietario</th></tr>";
    foreach($autos as $mat => $r) {
        $tabla .= "<tr>
            <td>$mat</td>
            <td>{$r['Auto']['marca']}</td>
            <td>{$r['Auto']['modelo']}</td>
            <td>{$r['Auto']['tipo']}</td>
            <td>{$r['Propietario']['nombre']}</td>
        </tr>";
    }
    $tabla .= "</table>";
    return $tabla;
}
?>

