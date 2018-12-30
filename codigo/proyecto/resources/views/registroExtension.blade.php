@extends('UCN_layout')

@section('title')Registrar actividad de extension
@endsection

@section('content')
<body>

<div class="container">
    <form autocomplete="off" method="POST" action="{{url('/registroExtension')}}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="inputActividad" class="col-sm-2 col-form-label">Nombre de actividad</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name= "nombre" id="inputActividad">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputLocalizacion" class="col-sm-2 col-form-label">Localización</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name= "localizacion" id="inputLocalizacion">
            </div>
        </div>
        <table id="myTable" class=" table order-list">
            <thead>
            <tr>
                <td>Orador/es</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="col-sm-3">
                    <input type="text" name="oradores[]" class="form-control" />
                </td>
                <td class="col-sm-2"><a class="deleteRow"></a>

                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5" style="text-align: left;">
                    <input type="button" class="btn btn-lg btn-block " id="addrow" value="Añadir Fila" />
                </td>
            </tr>
            <tr>
            </tr>
            </tfoot>
        </table>
        <table id="myTable2" class=" table order-list">
            <thead>
            <tr>
                <td>Organizador/es</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="col-sm-3">
                    <input type="text" name="organizadores[]" class="form-control" />
                </td>
                <td class="col-sm-2"><a class="deleteRow"></a>

                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5" style="text-align: left;">
                    <input type="button" class="btn btn-lg btn-block " id="addrow2" value="Añadir Fila" />
                </td>
            </tr>
            <tr>
            </tr>
            </tfoot>
        </table>

        <div class="form-group row">
            <label for="inputFecha" class="col-sm-2 col-form-label">Fecha</label>
            <div class="col-sm-3">
                <input id="datepicker" onkeydown="return false" class="date" name = "fecha" width="276" />
            </div>
        </div>

        <div class="form-group row">
            <label for="inputAsistentes" class="col-sm-2 col-form-label">Cantidad de asistentes</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" name= "cant_asistentes" id="inputAsistentes"
                       min = 0 onkeypress='return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57'>
            </div>
        </div>


        <div class="form-group row">
            <label for="inputEvidencia" class="col-sm-2 col-form-label">Evidencia</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name= "evidencia" id="inputEvidencia">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputId" class="col-sm-2 col-form-label">Id de convenio relacionado</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" name= "convenio_id" id="inputId" placeholder="Dejar en blanco si no tiene"
                       min = 0 onkeypress='return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57'>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-2">
        <span class="border">
          <button type="submit" class="btn btn-secondary">Confirmar</button>
        </span>
            </div>
            <div class="col-sm-3">
        <span class="border">
            <a class="btn btn-secondary" href="{{route('menuRegistros')}}" role="button">Cancelar</a>
        </span>
            </div>
        </div>






<script>
            $('.date').datepicker({
                forceparse: true,
                autoclose: true,
                format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap4'
            });

            // Multiple Rows:

            $(document).ready(function () {
                var counter = 0;

                $("#addrow").on("click", function () {
                    var newRow = $("<tr>");
                    var cols = "";

                    cols += '<td><input type="text" class="form-control" name="oradores[]"/></td>';
                    cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Borrar Fila"></td>';
                    newRow.append(cols);
                    $("#myTable.order-list").append(newRow);
                    counter++;
                });
                $("#addrow2").on("click", function () {
                    var newRow = $("<tr>");
                    var cols = "";

                    cols += '<td><input type="text" class="form-control" name="organizadores[]"/></td>';
                    cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Borrar Fila"></td>';
                    newRow.append(cols);
                    $("#myTable2.order-list").append(newRow);
                    counter++;
                });


                $("table.order-list").on("click", ".ibtnDel", function (event) {
                    $(this).closest("tr").remove();
                    counter -= 1
                });


            });


            function calculateRow(row) {
                var price = +row.find('input[name^="price"]').val();

            }

            function calculateGrandTotal() {
                var grandTotal = 0;
                $("table.order-list").find('input[name^="price"]').each(function () {
                    grandTotal += +$(this).val();
                });
                $("#grandtotal").text(grandTotal.toFixed(2));
            }
        </script>

    </form>
</div>

</body>
</html>

    @endsection

