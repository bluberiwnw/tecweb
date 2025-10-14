<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Productos Vigentes</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
<h3>Productos Vigentes</h3>
<?php
$link = new mysqli('localhost','root','Raquel1809*','marketzone');
if ($link->connect_errno) die("Error: ".$link->connect_error);
$link->set_charset("utf8");

$result = $link->query("SELECT * FROM productos WHERE eliminado=0 ORDER BY id ASC");
$rows = [];
if($result && $result->num_rows > 0){
    while($row = $result->fetch_assoc()) $rows[] = $row;
    $result->free();
}
$link->close();
?>

<?php if(count($rows) > 0): ?>
<table class="table table-bordered table-hover">
<thead class="thead-dark">
<tr>
<th>#</th><th>Nombre</th><th>Marca</th><th>Modelo</th><th>Precio</th><th>Unidades</th><th>Detalles</th><th>Imagen</th><th>Acción</th>
</tr>
</thead>
<tbody>
<?php foreach($rows as $row): ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= htmlspecialchars($row['nombre'],ENT_QUOTES) ?></td>
<td><?= htmlspecialchars($row['marca'],ENT_QUOTES) ?></td>
<td><?= htmlspecialchars($row['modelo'],ENT_QUOTES) ?></td>
<td>$<?= number_format($row['precio'],2) ?></td>
<td><?= $row['unidades'] ?></td>
<td><?= htmlspecialchars($row['detalles'],ENT_QUOTES) ?></td>
<td><?php if(!empty($row['imagen'])): ?><img src="<?= $row['imagen'] ?>" width="60"><?php endif; ?></td>
<td>
<a href="formulario_productos_v2.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php else: ?>
<p>No hay productos vigentes.</p>
<?php endif; ?>
</div>
</body>
</html>
