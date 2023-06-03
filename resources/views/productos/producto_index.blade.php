@extends('plantilla')
@section('contenido')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> ADMINISTRACIÓN DE PRODUCTOS</h4>
            </div>
            <div class="card-body">
                <a href="" class="btn btn-success">NUEVO REGISTRO</a>
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
                                <td><?= ($key+1) ?></td>
                                <td><?= $value->pro_imagen ?></td>
                                <td></td>
                                <td><?= $value->cat_nombre ?></td>
                                <td><?= $value->pro_nombre ?></td>
                                <td><?= $value->pro_descripcion ?></td>
                                <td><?= $value->pro_stock ?></td>
                                <td><?= $value->pro_fecha_reg ?></td>
                                <td><?= $value->pro_estado ?></td>
                                <td>
                                <a href="" class="btn btn-warning">EDITAR</a>
                                <a href="" class="btn btn-danger">ELIMINAR</a>
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

@endsection