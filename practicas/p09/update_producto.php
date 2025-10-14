<?php
// Configuración de conexión
$host = "localhost";
$usuario = "root";
$clave = "Raquel1809*";
$bd = "marketzone";

// Crear conexión
$conn = new mysqli($host, $usuario, $clave, $bd);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$conn->set_charset("utf8");

// Verificar si se enviaron datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $id = intval($_POST['id']);
    $nombre = isset($_POST['nombre']) ? $conn->real_escape_string($_POST['nombre']) : '';
    $marca = isset($_POST['marca']) ? $conn->real_escape_string($_POST['marca']) : '';
    $modelo = isset($_POST['modelo']) ? $conn->real_escape_string($_POST['modelo']) : '';
    $precio = isset($_POST['precio']) ? floatval($_POST['precio']) : 0;
    $detalles = isset($_POST['detalles']) ? $conn->real_escape_string($_POST['detalles']) : '';
    $unidades = isset($_POST['unidades']) ? intval($_POST['unidades']) : 0;
    $imagen = NULL;

    // Carpeta donde se guardarán las imágenes
    $carpetaDestino = "img/";
    if (!is_dir($carpetaDestino)) mkdir($carpetaDestino, 0777, true);

    // Manejo de imagen (opcional)
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $nombreArchivo = basename($_FILES['imagen']['name']);
        $rutaDestino = $carpetaDestino . $nombreArchivo;
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
            $imagen = $conn->real_escape_string($rutaDestino);
        } else {
            echo "<p style='color:red;'>Error al subir la imagen. Se usará la existente.</p>";
        }
    }

    // Query de actualización
    $sql = "UPDATE productos SET 
            nombre='$nombre',
            marca='$marca',
            modelo='$modelo',
            precio=$precio,
            detalles='$detalles',
            unidades=$unidades"
            . ($imagen ? ", imagen='$imagen'" : "") .
            " WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Producto actualizado con éxito</h2>";
        echo "<p><strong>Nombre:</strong> $nombre</p>";
        echo "<p><strong>Marca:</strong> $marca</p>";
        echo "<p><strong>Modelo:</strong> $modelo</p>";
        echo "<p><strong>Precio:</strong> $$precio</p>";
        echo "<p><strong>Detalles:</strong> $detalles</p>";
        echo "<p><strong>Unidades:</strong> $unidades</p>";

        // Mostrar imagen actual
        $imagenMostrar = $imagen ? $imagen : "img/default.png";
        echo "<p><strong>Imagen:</strong><br><img src='$imagenMostrar' width='150' style='border:1px solid #ccc; padding:4px;'></p>";

        // Botón para volver al formulario
        echo "<a href='formulario_productos_v2.php' style='display:inline-block;margin-top:15px;padding:10px 15px;background:#28a745;color:#fff;text-decoration:none;border-radius:4px;'>Editar otro producto</a>";

        // Hipervínculos a listados
        echo "<div style='margin-top:20px;'>";
        echo "<a href='get_productos_xhtml_v2.php' style='margin-right:10px;'>Ver todos los productos (XHTML)</a>";
        echo "<a href='get_productos_vigentes_v2.php'>Ver productos vigentes</a>";
        echo "</div>";
    } else {
        echo "<p style='color:red;'>Error al actualizar: " . $conn->error . "</p>";
        echo "<a href='formulario_productos_v2.php' style='display:inline-block;margin-top:10px;padding:8px 12px;background:#007bff;color:#fff;text-decoration:none;border-radius:4px;'>Volver al formulario</a>";
    }

} else {
    // Si se accede directamente sin enviar formulario
    echo "
    <div style='font-family:Segoe UI, Tahoma, sans-serif; text-align:center; margin-top:100px;'>
        <h2 style='color:#d9534f;'>Acceso inválido</h2>
        <p>Por favor, accede al formulario de edición desde la página correspondiente.</p>
        <a href='formulario_productos_v2.php' style='display:inline-block;margin-top:15px;padding:10px 15px;background:#007bff;color:#fff;text-decoration:none;border-radius:4px;'>Ir al formulario</a>
    </div>";
}

$conn->close();
?>
