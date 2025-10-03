<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<?php
if (isset($_GET['tope']))
    $tope = $_GET['tope'];

if (!empty($tope))
{
    /** SE CREA EL OBJETO DE CONEXION */
    @$link = new mysqli('localhost', 'root', 'Raquel1809*', 'marketzone');	

    /** comprobar la conexión */
    if ($link->connect_errno) 
    {
        die('Falló la conexión: '.$link->connect_error.'<br/>');
    }

    /** Forzar UTF-8 en la conexión */
    $link->set_charset("utf8");

    /** Ejecutar consulta */
    if ($result = $link->query("SELECT * FROM productos WHERE unidades <= '{$tope}'")) 
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
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Productos (tope = <?php echo isset($tope)?$tope:''; ?>)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>
<body>
    <h3>PRODUCTO</h3>
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
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $row): ?>
                <tr>
                    <th scope="row"><?= htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') ?></th>
                    <td><?= htmlspecialchars($row['nombre'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($row['marca'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($row['modelo'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($row['precio'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($row['unidades'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($row['detalles'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><img src="<?= htmlspecialchars($row['imagen'], ENT_QUOTES, 'UTF-8') ?>" width="80" alt="Imagen del producto"/></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php elseif(!empty($tope)) : ?>

        <script type="text/javascript">
            alert('No hay productos con unidades menores o iguales a <?php echo $tope; ?>');
        </script>

    <?php endif; ?>
</body>
</html>
