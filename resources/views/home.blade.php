@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @auth
                        
                    <a name="" id="" class="btn btn-primary" href="{{ route('productos.create') }}" role="button">Crear producto</a>
                    <a name="" id="" class="btn btn-primary" href="{{ route('productos.index') }}" role="button">Ver catalogo</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection