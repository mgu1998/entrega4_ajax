@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')

@push('scripts')
<script>
$(document).ready(function() {
    $('#datos').DataTable({
        "order": [
            [3, "desc"]
        ]
    });
});
</script>
@endpush
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url('backend/moneda/create') }}" class="btn btn-primary">Añadir moneda</a>
            </div>
        </div>
    </div>
</div>
@if(session()->has('op'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success" role="alert">
            Operation: {{ session()->get('op') }}. Id: {{ session()->get('id') }}. Result: {{ session()->get('r') }}
        </div>
    </div>
</div>
@endif

<table class="table table-hover" id="datos">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Simbolo</th>
            <th scope="col">Pais</th>
            <th scope="col">Valor</th>
            <th scope="col">Fecha</th>
            <th scope="col">Show</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($monedas as $moneda)
        <tr>
            <td scope="row">{{ $moneda->id }}</td>
            <td>{{ $moneda->nombre }}</td>
            <td>{{ $moneda->simbolo }}
            <td>{{ $moneda->pais }}</td>
            <td>{{ $moneda->valor }}</td>
            <td>{{ date('d-m-Y', strtotime($moneda->fecha)) }}</td>

            <td><a href="{{ url('backend/moneda/' . $moneda->id) }}">Show</a></td>
            <td><a href="{{ url('backend/moneda/' . $moneda->id . '/edit') }}">Edit</a></td>
            <td><a href="#" data-id="{{ $moneda->id }}" class="enlaceBorrar">Delete</a></td>
        </tr>
        @endforeach
    </tbody>
    <form id="formDelete" action="{{ url('backend/moneda') }}" method="post">
        @method('delete')
        @csrf
    </form>
</table>

@endsection