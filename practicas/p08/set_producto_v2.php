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

    // Manejo de imagen (opcional)
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $nombreArchivo = basename($_FILES['imagen']['name']);
        $rutaDestino = "img/" . $nombreArchivo;
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
            $imagen = $conn->real_escape_string($nombreArchivo);
        } else {
            echo "<p>Error al subir la imagen.</p>";
        }
    }

    // Validar que no exista ya el producto
    $check = $conn->query("SELECT * FROM productos WHERE nombre='$nombre' AND modelo='$modelo' AND marca='$marca'");
    if ($check->num_rows > 0) {
        echo "<p>El producto ya existe en la base de datos.</p>";
        exit;
    }

    // Query de inserción usando column names
    $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen)
            VALUES ('$nombre', '$marca', '$modelo', $precio, '$detalles', $unidades, " . ($imagen ? "'$imagen'" : "NULL") . ")";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Producto registrado con éxito</h2>";
        echo "<p><strong>Nombre:</strong> $nombre</p>";
        echo "<p><strong>Marca:</strong> $marca</p>";
        echo "<p><strong>Modelo:</strong> $modelo</p>";
        echo "<p><strong>Precio:</strong> $precio</p>";
        echo "<p><strong>Detalles:</strong> $detalles</p>";
        echo "<p><strong>Unidades:</strong> $unidades</p>";
        if ($imagen) echo "<p><strong>Imagen:</strong> <img src='uploads/$imagen' width='150'></p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

} else {
    // Si se accede al script sin enviar el formulario
    echo "<p>Acceso inválido. Por favor envía el formulario desde <a href='formulario_productos.html'>aquí</a>.</p>";
}

$conn->close();
?>
