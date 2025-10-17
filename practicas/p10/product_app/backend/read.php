<?php
include_once __DIR__.'/database.php';

$data = array();

if(isset($_POST['search'])) {
    $search = $conexion->real_escape_string($_POST['search']);
    $query = "SELECT * FROM productos 
              WHERE nombre LIKE '%$search%' 
                 OR marca LIKE '%$search%' 
                 OR detalles LIKE '%$search%'";
    
    if($result = $conexion->query($query)) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $result->free();
    } else {
        die('Query Error: '.mysqli_error($conexion));
    }
}

$conexion->close();

echo json_encode($data, JSON_PRETTY_PRINT);
?>
