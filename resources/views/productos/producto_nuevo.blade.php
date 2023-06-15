@extends('plantilla')
@section('contenido')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> FORMULARIO NUEVO REGISTRO</h4>
            </div>
            <div class="card-body">

                <form id="nuevoRegistroProducto" method="post">
                @csrf
                    <div class="row">

                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label for="categoria_id">Categoría: </label>
                                <select id="categoria_id" name="categoria_id" class="form-control">
                                    <?php foreach ($categorias as $key => $categoria) : ?>
                                        <option value="<?= $categoria->id ?>"><?= $categoria->cat_nombre ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 pr-1">
                            <div class="form-group">
                                <label for="imagen">Imagen: </label>
                                <input id="imagen" name="imagen" type="file" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label for="nombre">Nombre producto: </label>
                                <input id="nombre" name="nombre" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label for="descripcion">Descripción: </label>
                                <input id="descripcion" name="descripcion" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3 pl-1">
                            <div class="form-group">
                                <label for="stock">Stock: </label>
                                <input id="stock" name="stock" type="text" onkeypress="return solonumeros(event);" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="item">Item: </label>
                                <input id="item" name="item" type="text" class="form-control">
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

    $("#nuevoRegistroProducto").submit(function(event) {
        event.preventDefault();
        var formData = new FormData($("#nuevoRegistroProducto")[0]);
        $.ajax({
            url: '/nuevoRegistroProducto',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function() {
                Swal.fire('DATOS GUARDADOS CON ÉXITO!', '', 'success');
                window.location = '/adminProductos';
            },
            error: function(error){
                alert(error);
            }
        });
    });
    /*$("#nuevoRegistroProducto").submit(function(event) {
        event.preventDefault();
        alert("Se detuvo el registro de informacion!!!");
    });*/

    /*$("#nuevoRegistroProducto").on("submit", function(e) { //id of form 
        e.preventDefault();
        alert("Se detuvo el registro de informacion!!!");
    });*/
</script>

@endsection