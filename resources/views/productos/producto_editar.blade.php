@extends('plantilla')
@section('contenido')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> FORMULARIO EDITAR REGISTRO</h4>
            </div>
            <div class="card-body">

                <form id="editarRegistroProducto" method="post">
                    @csrf
                    <input id="id" name="id" value="<?= $obj->id ?>" type="hidden" class="form-control">
                    <input id="pro_imagen" name="pro_imagen" value="<?= $obj->pro_imagen ?>" type="hidden" class="form-control">
                    <div class="row">

                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label for="categoria_id">Categoría: </label>
                                <select id="categoria_id" name="categoria_id" class="form-control">
                                    <?php foreach ($categorias as $key => $categoria) : ?>
                                        <option value="<?= $categoria->id ?>" <?php if($categoria->id == $obj->categoria_id) echo 'selected' ?>><?= $categoria->cat_nombre ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 pr-1">
                            <div class="form-group">
                                <label for="imagen">Imagen: </label>
                                <input id="imagen" name="imagen" type="file" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label for="nombre">Nombre producto: </label>
                                <input id="nombre" name="nombre" value="<?= $obj->pro_nombre ?>" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label for="descripcion">Descripción: </label>
                                <input id="descripcion" name="descripcion" value="<?= $obj->pro_descripcion ?>" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3 pl-1">
                            <div class="form-group">
                                <label for="stock">Stock: </label>
                                <input id="stock" name="stock" type="text" value="<?= $obj->pro_stock ?>" onkeypress="return solonumeros(event);" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="item">Item: </label>
                                <input id="item" name="item"  value="<?= $obj->pro_item ?>" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary btn-lg">GUARDAR DATOS</button>
                        <a href="" class="btn btn-primary btn-lg">SALIR</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
<script>
    function solonumeros(evt) {
        var code = (evt.which) ? evt.which : evt.keyCode;
        if (code == 8) { // backspace.
            return true;
        } else if (code >= 48 && code <= 57) { // is a number.
            return true;
        } else { // other keys.
            return false;
        }
    }

    $("#editarRegistroProducto").submit(function(event) {
        event.preventDefault();
        var formData = new FormData($("#editarRegistroProducto")[0]);
        $.ajax({
            url: '/editarRegistroProducto',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function() {
                Swal.fire('DATOS GUARDADOS CON ÉXITO!', '', 'success');
                window.location = '/adminProductos';
            }
        });
    });
</script>

@endsection