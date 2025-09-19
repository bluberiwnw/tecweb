<?php
include 'SRC/funciones.php';

if (isset($_GET['buscar'])) {
    $matricula = $_GET['matricula'];
    echo buscarAuto($matricula);
} elseif (isset($_GET['accion']) && $_GET['accion'] === 'mostrar_todo') {
    echo mostrarAutos();
} else {
    echo "<p>No se recibió ninguna acción.</p>";
}
?>
