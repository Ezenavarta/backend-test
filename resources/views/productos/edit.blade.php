@extends('../layouts.app')
@section('content')
<div class="container col-6 justify-content-center">
    <form action="/productos/{{$producto->id}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <input class="form-control m-3"type="text" name="name" placeholder="Nombre" maxlength="60" value="{{$producto->name}}">
            <input class="form-control m-3"type="text" name="description" placeholder="Descripcion" maxlength="10000" value="{{$producto->description}}">
            <input class="form-control m-3"type="number" name="price" placeholder="Precio" maxlength="20" value="{{$producto->price}}">
            <input class="form-control m-3" type="text" name="video" placeholder="Youtube Link" maxlength="200" value="{{$producto->video}}">
            <input class="form-control m-3" type="file" name="photo" accept="image/*" value="{{$producto->photo}}">
            <input class="btn btn-danger m-3 btn-block" type="submit" value="Editar" name="enviar">
        </div>
    </form>
</div>
@if (count($errors)>0)
<div class="container">
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger m-4" role="alert">
        {{$error}}
    </div>
    @endforeach
</div>
</div>
@endif
@endsection