@extends('layouts/master')
@section('content')
<div class="row">
    <div class="col-sm-4">
        <img src="{{$id->poster}}" />
    </div>
    <div class="col-sm-8">
        <h3 class="text-secondary">
            {{$id->title}}
        </h3>

        <h5 class="text-secondary">
            Año: {{$id->year}}
        </h5>

        <h5 class="text-secondary">
            Director: {{$id->director}}
        </h5>

        <p class="text-secondary mt-4"><span class="text-dark">Resumen: </span>{{$id->synopsis}}</p>

        @if ($id->rented)
            <p class="text-secondary mt-2"><span class="text-dark">Estado: </span>La película se encuentra actualmente alquilada</p>

            <form action="/catalog/alquilar/{{$id->id}}" method="POST" class="d-inline-block">
                @csrf
                @method('PUT')
                <button class="btn btn-danger">Devolver película</button>
            </form>
        @else
            <p class="text-secondary mt-2"><span class="text-dark">Estado: </span>La película está disponible para alquilar</p>
            <form action="/catalog/alquilar/{{$id->id}}" method="POST" class="d-inline-block">
                @csrf
                @method('PUT')
                <button class="btn btn-danger">Alquilar película</button>
            </form>        
        @endif

        
        <button class="btn btn-warning"><a href="/catalog/edit/{{$id->id}}" class="text-white">Editar película</a></button>
        <button class="btn btn-light"><a href="/catalog" class="text-dark">Volver al listado</a></button>


    </div>
    </div>
@endsection