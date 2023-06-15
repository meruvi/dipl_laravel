@extends('plantilla')
@section('contenido')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> ADMINISTRACIÓN DE PRODUCTOS</h4>
            </div>
            <div class="card-body">
                <a href="/nuevoProducto" class="btn btn-success">NUEVO REGISTRO</a>
                <a href="" class="btn btn-danger">REPORTE PDF</a>
                <a href="" class="btn btn-info">REPORTE EXCEL</a>
                <div class="table-responsive">
                    <table class="table" style="font-size: 12px;">
                        <thead class=" text-primary">
                            <th>#</th>
                            <th>Imagen</th>
                            <th>Item</th>
                            <th>Categoria</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Stock</th>
                            <th>Fecha Reg,</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            <?php foreach ($listado as $key => $value) : ?>
                                <tr>
                                    <td><?= ($key + 1) ?></td>
                                    <td><img src="/imagen_producto/<?= $value->pro_imagen ?>" width="50" /></td>
                                    <td><?= $value->pro_item ?></td>
                                    <td><?= $value->cat_nombre ?></td>
                                    <td><?= $value->pro_nombre ?></td>
                                    <td><?= $value->pro_descripcion ?></td>
                                    <td><?= $value->pro_stock ?></td>
                                    <td><?= $value->pro_fecha_reg ?></td>
                                    <td><?= $value->pro_estado ?></td>
                                    <td>
                                        <a href="/editarProducto/<?= $value->id ?>" class="btn btn-warning">EDITAR</a>
                                        <a href="#" onclick="eliminarProducto('<?= $value->id ?>')" class="btn btn-danger">ELIMINAR</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    function eliminarProducto(id) {
        //alert(id)
        Swal.fire({
            title: '¿Estas seguro de eliminar este registro?',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.value) {


                $.post('<?= route('pro.eliminarProducto') ?>', {
                    id
                }, function() {
                    Swal.fire(
                        'ELIMINADO!',
                        '',
                        'success'
                    )
                    window.location=''
                })


            }
        })
    }
</script>

@endsection