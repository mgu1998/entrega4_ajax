@extends('backend.base')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
                <a href="{{ url('backend/moneda') }}" class="btn btn-primary">Ver Monedas</a>
            </div>
        </div>
    </div>
</div>
@if(session()->has('error'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-danger" role="alert">
            <h2>Error ...</h2>
        </div>
    </div>
</div>
@endif
<form role="form" action="" method="post" id="createMonedaForm">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" maxlength="30" minlength="2" required class="form-control" id="nombre"
                placeholder="Nombre de la moneda" name="nombre" value="{{ old('nombre') }}">
        </div>
        <div class="form-group">
            <label for="simbolo">Simbolo</label>
            <input type="text" maxlength="4" minlength="1" required class="form-control" id="simbolo"
                placeholder="Simbolo de la moneda" name="simbolo" value="{{ old('simbolo') }}">
        </div>
        <div class="form-group">
            <label for="pais">Pais</label>
            <input type="text" maxlength="25" minlength="2" required class="form-control" id="pais"
                placeholder="Pais de la moneda" name="pais" value="{{ old('pais') }}">
        </div>
        <div class="form-group">
            <label for="valor">Valor en Euros</label>
            <input type="number" step="any" required class="form-control" id="valor"
                placeholder="Valor de la moneda en Euros" name="valor" value="{{ old('valor') }}">
        </div>
        <div class="form-group">
            <label for="fecha">Fecha de entrada en vigor</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha') }}">
        </div>

    </div>

    <!-- /.card-body -->
    <div class="card-footer">
        <button type="button" class="btn btn-primary btn-submit">Añadir</button>
    </div>

    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit").click(function(e) {

        e.preventDefault();

        var nombre = $("input[name=nombre]").val();
        var simbolo = $("input[name=simbolo]").val();
        var pais = $("input[name=pais]").val();
        var valor = $("input[name=valor]").val();
        var fecha = $("input[name=fecha]").val();

        var url = '/backend/moneda/postinsert';

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                nombre: nombre,
                simbolo: simbolo,
                pais: pais,
                valor: valor,
                fecha: fecha
            },
            success: function(response) {
                if (response.success) {
                    alert(response.message) //Message come from controller
                } else {
                    alert("Error")
                }
            },
            error: function(error) {
                console.log(error)
            }
        });
    });
    </script>
</form>
@endsection