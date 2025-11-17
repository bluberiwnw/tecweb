// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
};

$(document).ready(function(){

    function init() {
        $('#description').val(JSON.stringify(baseJSON, null, 2));
        listarProductos();
        console.log("JQuery is working.");
    }
    init();

    function listarProductos() {
        $.getJSON('./backend/product-list.php', function(productos){
            console.log("Listar: Productos recibidos:", productos);
            if(productos && productos.length > 0){
                mostrarDatos(productos);
            }
        });
    }

    function mostrarDatos(productos){
        let template = '';
        productos.forEach(function(producto){
            let descripcion = `
                <li>precio: ${producto.precio}</li>
                <li>unidades: ${producto.unidades}</li>
                <li>modelo: ${producto.modelo}</li>
                <li>marca: ${producto.marca}</li>
                <li>detalles: ${producto.detalles}</li>
            `;
            template += `
                <tr productId="${producto.id}">
                    <td>${producto.id}</td>
                    <td>${producto.nombre}</td>
                    <td><ul>${descripcion}</ul></td>
                    <td>
                        <button class="product-edit btn btn-warning btn-sm">Editar</button>
                        <button class="product-delete btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>
            `;
        });
        $('#products').html(template);
        console.log("Tabla actualizada.");
    }

    $('#product-form').submit(function(e){
        e.preventDefault();

        let finalJSON = JSON.parse($('#description').val());
        finalJSON.nombre = $('#name').val();

        let url = './backend/product-add.php';
        let tipo = 'Agregar';

        if($('#productId').val() != '') {
            finalJSON.id = parseInt($('#productId').val());
            url = './backend/product-update.php';
            tipo = 'Actualizar';
        }

        $.ajax({
            url: url,
            type: 'POST',
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify(finalJSON),
            success: function(data){
                $('#container').html(`
                    <li style="list-style:none;">status: ${data.status}</li>
                    <li style="list-style:none;">message: ${data.message}</li>
                `);
                $('#product-result').removeClass('d-none').show().delay(3000).fadeOut();
                listarProductos();
                console.log(`[${tipo}] Respuesta servidor:`, data);
            },
            error: function(xhr, status, error){
                console.error(`[${tipo}] Error AJAX:`, status, error);
            }
        });
    });

    $(document).on('click', '.product-delete', function(){
        if(confirm("¿Deseas eliminar el Producto?")){
            let id = $(this).closest('tr').attr('productId');

            $.getJSON('./backend/product-delete.php', { id: id }, function(data){
                $('#container').html(`
                    <li style="list-style:none;">status: ${data.status}</li>
                    <li style="list-style:none;">message: ${data.message}</li>
                `);
                $('#product-result').removeClass('d-none').addClass('d-block');
                listarProductos();
                console.log("Eliminar: Respuesta servidor:", data);
            });
        }
    });

    $(document).on('click', '.product-edit', function(){
        let row = $(this).closest('tr');
        let id = row.attr('productId');
        let nombre = row.find('td:eq(1)').text();
        let descripcionLi = row.find('td:eq(2) ul li');
        let obj = {};

        descripcionLi.each(function(){
            let parts = $(this).text().split(': ');
            obj[parts[0]] = isNaN(parts[1]) ? parts[1] : Number(parts[1]);
        });

        $('#productId').val(id);
        $('#name').val(nombre);
        $('#description').val(JSON.stringify(obj, null, 2));
        $('#product-form button[type="submit"]').text('Actualizar Producto');

        console.log("Editar: Producto en formulario:", {id, nombre, obj});
    });

    $('#search').on('keyup', function(){
        let search = $(this).val();

        $.getJSON('./backend/product-search.php', { search: search }, function(productos){
            mostrarDatos(productos);

            let template_bar = '';
            productos.forEach(function(producto){
                template_bar += `<li>${producto.nombre}</li>`;
            });
            $('#product-result').removeClass('d-none').addClass('d-block');
            $('#container').html(template_bar);

            console.log("Buscar: Resultados búsqueda:", productos);
        });
    });

});
