<?php
header('Content-Type: application/json'); 
include_once __DIR__.'/database.php';

$data = [
    'status' => 'error',
    'message' => 'La actualización falló'
];

$producto = file_get_contents('php://input');
$jsonOBJ = json_decode($producto);

if($jsonOBJ->nombre && isset($jsonOBJ->id)){
    $id = intval($jsonOBJ->id);
    $nombre = $jsonOBJ->nombre;
    $marca = $jsonOBJ->marca;
    $modelo = $jsonOBJ->modelo;
    $precio = floatval($jsonOBJ->precio);
    $detalles = $jsonOBJ->detalles;
    $unidades = intval($jsonOBJ->unidades);
    $imagen = $jsonOBJ->imagen;

    $sql = "UPDATE productos SET 
                nombre='{$nombre}', 
                marca='{$marca}', 
                modelo='{$modelo}', 
                precio={$precio}, 
                detalles='{$detalles}', 
                unidades={$unidades}, 
                imagen='{$imagen}' 
            WHERE id={$id}";

    if($conexion->query($sql)){
        $data['status'] = 'success';
        $data['message'] = 'Producto actualizado';
    } else {
        $data['message'] = "ERROR SQL: " . $conexion->error;
    }
}

$conexion->close();

ob_clean();
echo json_encode($data);
exit;