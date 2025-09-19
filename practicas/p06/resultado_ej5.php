<?php
include 'SRC/funciones.php'; 

if (isset($_POST['edad']) && isset($_POST['sexo'])) {
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];

    echo verificarEdadSexo($edad, $sexo);
} else {
    echo "<p style='color:red;'>No se recibieron datos.</p>";
}
?>
