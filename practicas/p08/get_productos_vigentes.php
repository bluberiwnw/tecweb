<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<?php
/** SE CREA EL OBJETO DE CONEXION */
@$link = new mysqli('localhost', 'root', 'Raquel1809*', 'marketzone');    

/** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
}

/** Forzar UTF-8 en la conexión */
$link->set_charset("utf8");

/** Ejecutar consulta para productos, mostrando primero los eliminados */
if ($result = $link->query("SELECT * FROM productos ORDER BY eliminado DESC, id ASC")) 
{
    /** Si hay resultados */
    if ($result->num_rows > 0) {
        $rows = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $rows[] = $row;
        }
    }
    /** Liberar memoria */
    $result->free();
}

$link->close();
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Productos Vigentes y Eliminados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>
<body>
    <h3>PRODUCTOS VIGENTES Y ELIMINADOS</h3>
    <br/>

    <?php if( isset($rows) && count($rows) > 0 ) : ?>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Unidades</th>
                    <th scope="col">Detalles</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Eliminado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $row): ?>
                <tr <?= ($row['eliminado'] == 1) ? "class='table-danger'" : "" ?>>
                    <th scope="row"><?= htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') ?></th>
                    <td><?= htmlspecialchars($row['nombre'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($row['marca'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($row['modelo'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td>$<?= number_format($row['precio'], 2) ?></td>
                    <td><?= htmlspecialchars($row['unidades'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($row['detalles'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td>
                        <?php if(!empty($row['imagen'])): ?>
                            <img src="<?= htmlspecialchars($row['imagen'], ENT_QUOTES, 'UTF-8') ?>" width="80" alt="Imagen del producto"/>
                        <?php endif; ?>
                    </td>
                    <td><?= ($row['eliminado'] == 1) ? "Sí" : "No" ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php else : ?>

        <script type="text/javascript">
            alert('No hay productos para mostrar.');
        </script>

    <?php endif; ?>
</body>
</html>
