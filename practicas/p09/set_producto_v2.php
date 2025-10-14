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

// Verificar si se enviaron datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recibir y limpiar datos
    $nombre = isset($_POST['nombre']) ? $conn->real_escape_string($_POST['nombre']) : '';
    $marca = isset($_POST['marca']) ? $conn->real_escape_string($_POST['marca']) : '';
    $modelo = isset($_POST['modelo']) ? $conn->real_escape_string($_POST['modelo']) : '';
    $precio = isset($_POST['precio']) ? floatval($_POST['precio']) : 0;
    $detalles = isset($_POST['detalles']) ? $conn->real_escape_string($_POST['detalles']) : '';
    $unidades = isset($_POST['unidades']) ? intval($_POST['unidades']) : 0;
    $imagen = NULL;

    // Carpeta donde se guardarán las imágenes
    $carpetaDestino = "img/";

    // Verificar si la carpeta existe; si no, crearla
    if (!is_dir($carpetaDestino)) {
        mkdir($carpetaDestino, 0777, true);
    }

    // Manejo de imagen (opcional)
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $nombreArchivo = basename($_FILES['imagen']['name']);
        $rutaDestino = $carpetaDestino . $nombreArchivo;

        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
            $imagen = $conn->real_escape_string($rutaDestino);
        } else {
            echo "<p style='color:red;'>⚠️ Error al subir la imagen.</p>";
            $imagen = "img/default.png"; // usar imagen por defecto si falla
        }
    } else {
        // Si no se subió ninguna imagen, usar la imagen por defecto
        $imagen = "img/default.png";
    }

    // Validar que no exista ya el producto
    $check = $conn->query("SELECT * FROM productos WHERE nombre='$nombre' AND modelo='$modelo' AND marca='$marca'");
    if ($check->num_rows > 0) {
        echo "<p style='color:red;'>⚠️ El producto ya existe en la base de datos.</p>";
        echo "<a href='formulario_productos.html' style='display:inline-block;margin-top:10px;padding:8px 12px;background:#007bff;color:#fff;text-decoration:none;border-radius:4px;'>Volver al formulario</a>";
        exit;
    }

    // Query de inserción
    $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen)
            VALUES ('$nombre', '$marca', '$modelo', $precio, '$detalles', $unidades, '$imagen')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>✅ Producto registrado con éxito</h2>";
        echo "<p><strong>Nombre:</strong> $nombre</p>";
        echo "<p><strong>Marca:</strong> $marca</p>";
        echo "<p><strong>Modelo:</strong> $modelo</p>";
        echo "<p><strong>Precio:</strong> $$precio</p>";
        echo "<p><strong>Detalles:</strong> $detalles</p>";
        echo "<p><strong>Unidades:</strong> $unidades</p>";
        echo "<p><strong>Imagen:</strong><br><img src='$imagen' width='150' style='border:1px solid #ccc; padding:4px;'></p>";
        echo "<a href='formulario_productos.html' style='display:inline-block;margin-top:15px;padding:10px 15px;background:#28a745;color:#fff;text-decoration:none;border-radius:4px;'>Registrar otro producto</a>";
    } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
        echo "<a href='formulario_productos.html' style='display:inline-block;margin-top:10px;padding:8px 12px;background:#007bff;color:#fff;text-decoration:none;border-radius:4px;'>Volver al formulario</a>";
    }

} else {
    // Si se accede directamente sin enviar formulario
    echo "
    <div style='font-family:Segoe UI, Tahoma, sans-serif; text-align:center; margin-top:100px;'>
        <h2 style='color:#d9534f;'>⚠️ Acceso inválido</h2>
        <p>Por favor, envía el formulario desde la página de registro de productos.</p>
        <a href='formulario_productos.html' style='display:inline-block;margin-top:15px;padding:10px 15px;background:#007bff;color:#fff;text-decoration:none;border-radius:4px;'>Ir al formulario</a>
    </div>";
}

$conn->close();
?>
