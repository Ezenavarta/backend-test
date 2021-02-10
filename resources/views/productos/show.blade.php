@extends('layouts.app')

@section('content')
<div class="container yell">
    <div class="row padding">
        <div class="col-sm-8">
            <div class="carousel-inner">
                <div class="item active">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{$producto->video}}"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- Description column -->
        <div class="col-sm-4">
            <div class="card">
                <img class="card-img-top" src="{{$producto->photo}}" alt="Imagen de {{$producto->name}}">
                <div class="card-body">
                  <h5 class="card-title">{{$producto->name}}</h5>
                  <p class="card-text">{{$producto->description}}</p>
                  <strong>${{$producto->price}}</strong>
                  <a href="#" class="btn btn-primary float-right">Comprar</a>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection