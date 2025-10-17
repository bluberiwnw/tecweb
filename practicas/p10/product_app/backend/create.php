<?php
include_once __DIR__.'/database.php';

// Obtener los datos JSON enviados
$data = json_decode(file_get_contents("php://input"), true);

if(!$data){
    echo "Error: JSON inválido";
    exit;
}

$nombre  = $conexion->real_escape_string($data['nombre']);
$marca   = $conexion->real_escape_string($data['marca']);
$modelo  = $conexion->real_escape_string($data['modelo']);
$precio  = floatval($data['precio']);
$detalles= $conexion->real_escape_string($data['detalles']);
$unidades= intval($data['unidades']);
$imagen  = isset($data['imagen']) ? $conexion->real_escape_string($data['imagen']) : 'img/default.png';

// Validar si el producto ya existe
$query_check = "
SELECT * FROM productos 
WHERE eliminado = 0 AND 
      ((nombre = '$nombre' AND marca = '$marca') OR 
       (marca = '$marca' AND modelo = '$modelo'))
LIMIT 1
";

$result = $conexion->query($query_check);
if(!$result){
    echo "Error en consulta: ".$conexion->error;
    exit;
}

if($result->num_rows > 0){
    echo "Error: El producto ya existe";
    exit;
}

$query_insert = "
INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado)
VALUES ('$nombre', '$marca', '$modelo', $precio, '$detalles', $unidades, '$imagen', 0)
";

if($conexion->query($query_insert)){
    echo "Producto agregado correctamente";
} else {
    echo "Error al agregar producto: ".$conexion->error;
}

$conexion->close();
?>
