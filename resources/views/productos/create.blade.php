@extends('../layouts.app')
@section('content')
<form action="/productos" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="Nombre" maxlength="60">
    <input type="text" name="description" placeholder="Descripcion" maxlength="10000">
    <input type="number" name="price" placeholder="Precio" maxlength="20">
    <input type="text" name="video" placeholder="Youtube Link" maxlength="200">
    <input type="file" name="photo" accept="image/*">
    <input type="submit" value="Crear" name="enviar">
</form>
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

{{-- <script>
    $(".alert").alert();
</script> --}}
@endsection