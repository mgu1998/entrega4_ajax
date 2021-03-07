@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/moneda/' . $moneda->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
                <a href="{{ url('backend/moneda') }}" class="btn btn-primary">Ver Monedas</a>
                <a href="{{ url('backend/moneda/create') }}" class="btn btn-primary">Añadir moneda</a>
                <a href="#" data-id="{{ $moneda->id }}" data-name="{{ $moneda->name }}" class="btn btn-danger" id="enlaceBorrar">Borrar Moneda</a>
            </div>
        </div>
    </div>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Field</th>
            <th scope="col">Value</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Nombre</td>
            <td>{{$moneda->nombre}}</td>
        </tr>
        <tr>
            <td>Simbolo</td>
            <td>{{$moneda->simbolo}}</td>
        </tr>
        <tr>
            <td>Pais</td>
            <td>{{$moneda->pais}}</td>
        </tr>
        <tr>
            <td>Valor en Euros</td>
            <td>{{$moneda->valor}}</td>
        </tr>
        <tr>
            <td>Fecha de entrada en vigor</td>
            <td>{{$moneda->fecha}}</td>
        </tr>
    </tbody>
</table>
@endsection