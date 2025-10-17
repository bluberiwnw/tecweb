<?php
$producto = [
    'nombre'=>'',
    'marca'=>'',
    'modelo'=>'',
    'precio'=>'',
    'detalles'=>'',
    'unidades'=>'',
    'imagen'=>'img/default.png'
];

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $link = new mysqli('localhost','root','Raquel1809*','marketzone');
    if($link->connect_errno) die("Error: ".$link->connect_error);
    $link->set_charset("utf8");
    $result = $link->query("SELECT * FROM productos WHERE id=$id");
    if($result && $result->num_rows>0) $producto = $result->fetch_assoc();
    $link->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registro / Edición de Producto</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
.preview { max-width:120px; display:block; margin-top:10px; }
.container { max-width:700px; margin-top:40px; background:#fff; padding:30px; border-radius:10px; box-shadow:0 0 15px rgba(0,0,0,0.1);}
</style>
</head>
<body>
<div class="container">
<h3 class="text-center mb-4"><?= isset($id)?'Editar':'Registrar' ?> Producto</h3>
<form id="formProducto" action="<?= isset($id)?'update_producto.php':'set_producto_v2.php' ?>" method="post" enctype="multipart/form-data" onsubmit="return validarFormulario()">
<?php if(isset($id)) echo '<input type="hidden" name="id" value="'.$id.'">'; ?>

<div class="form-group">
<label>Nombre:</label>
<input type="text" name="nombre" id="nombre" class="form-control" maxlength="100" required value="<?= htmlspecialchars($producto['nombre']) ?>">
</div>

<div class="form-group">
<label>Marca:</label>
<select name="marca" id="marca" class="form-control" required>
<option value="">-- Selecciona una marca --</option>
<?php
$marcas = ['SEP','Santillana','Pearson','McGraw-Hill','Trillas'];
foreach($marcas as $m){
    $sel = ($producto['marca']==$m)?'selected':''; 
    echo "<option value='$m' $sel>$m</option>";
}
?>
</select>
</div>

<div class="form-group">
<label>Modelo:</label>
<input type="text" name="modelo" id="modelo" class="form-control" maxlength="25" pattern="[A-Za-z0-9]+" required value="<?= htmlspecialchars($producto['modelo']) ?>">
</div>

<div class="form-group">
<label>Precio:</label>
<input type="number" name="precio" id="precio" class="form-control" min="100" step="0.01" required value="<?= $producto['precio'] ?>">
</div>

<div class="form-group">
<label>Detalles:</label>
<textarea name="detalles" id="detalles" class="form-control" maxlength="250"><?= htmlspecialchars($producto['detalles']) ?></textarea>
</div>

<div class="form-group">
<label>Unidades:</label>
<input type="number" name="unidades" id="unidades" class="form-control" min="0" required value="<?= $producto['unidades'] ?>">
</div>

<div class="form-group">
<label>Imagen:</label>
<input type="file" name="imagen" id="imagen" class="form-control-file" accept="image/*" onchange="mostrarPreview(this)">
<img id="preview" class="preview" src="<?= $producto['imagen'] ?>">
</div>

<div class="text-center">
<button type="submit" class="btn btn-success"><?= isset($id)?'Actualizar':'Registrar' ?></button>
<button type="reset" class="btn btn-secondary">Limpiar</button>
</div>
</form>
</div>

<script>
function validarFormulario(){
    const nombre=document.getElementById('nombre').value.trim();
    const marca=document.getElementById('marca').value;
    const modelo=document.getElementById('modelo').value.trim();
    const precio=parseFloat(document.getElementById('precio').value);
    const detalles=document.getElementById('detalles').value.trim();
    const unidades=parseInt(document.getElementById('unidades').value);

    if(!nombre || nombre.length>100){ alert("Nombre obligatorio <=100"); return false; }
    if(marca===""){ alert("Selecciona marca"); return false; }
    const modeloRegex=/^[A-Za-z0-9]+$/;
    if(!modelo || modelo.length>25 || !modeloRegex.test(modelo)){ alert("Modelo alfanumérico <=25"); return false; }
    if(isNaN(precio)||precio<=99.99){ alert("El precio debe ser mayor a 99.99"); return false; }
    if(detalles.length>250){ alert("Detalles máximo 250 caracteres"); return false; }
    if(isNaN(unidades)||unidades<0){ alert("Unidades debe ser 0 o mayor"); return false; }
    return true;
}

function mostrarPreview(input){
    const preview=document.getElementById('preview');
    if(input.files && input.files[0]){
        const reader=new FileReader();
        reader.onload=function(e){ preview.src=e.target.result; }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
</body>
</html>
