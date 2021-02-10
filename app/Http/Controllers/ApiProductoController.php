<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;

class ApiProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return json_encode($productos);
    }

    public function find($request)
    {
        $productos = Producto::where('name', 'LIKE', '%'.$request.'%')->get();
        return json_encode($productos);
    }

    public function show($producto)
    {
        $producto = Producto::findOrFail($producto);
        return json_encode($producto);
    }

}
