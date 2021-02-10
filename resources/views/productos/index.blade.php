@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-colums"  style="display: flex; justify-content:space-around; flex-wrap: wrap;">
        @foreach ($productos as $producto)
        <div class="card col-3 p-2 m-2" style="display: inline-block">
            <img class="card-img-top" src="{{$producto->photo}}" alt="Imagen de {{$producto->name}}">
            <div class="card-body">
                <h5 class="card-title">{{$producto->name}}</h5>
                <p class="card-text">{{$producto->description}}</p>
                <strong>${{$producto->price}}</strong>
                <a href="{{route('productos.show', $producto->id)}}" class="btn btn-primary float-right">Comprar</a>
            </div>
        </div>
        @endforeach
    </div>
@endsection