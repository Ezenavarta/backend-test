<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Request::capture()->expectsJson()) {
            return "API Method";
        } else {
            $productos = Producto::all();
            return view('productos/index', compact('productos'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:60',
            'description' => 'required|max:10000',
            'price' => 'required|max:20',
            'video' => 'required|max:200',
            'photo' => 'required|image|max:4096',
        ]);

        $image = request('photo')->store('public/productImages');

        $producto = Producto::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'photo' => Storage::url($image),
            'video' => $this->getYoutubeEmbedUrl($request->video),
        ]);

        return redirect()->route('productos.show', $producto->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        $producto = Producto::findOrFail($producto);
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        $producto = Producto::findOrFail($producto);
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idproducto)
    {
        $producto = Producto::findOrFail($idproducto);

        $this->validate($request, [
            'name' => 'required|max:60',
            'description' => 'required|max:10000',
            'price' => 'required|max:20',
            'video' => 'required|max:200',
            'photo' => 'required|image|max:4096',
        ]);

        $image = request('photo')->store('public/productImages');

        $producto->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'photo' => Storage::url($image),
            'video' => $this->getYoutubeEmbedUrl($request->video),
        ]);
        
        return redirect()->route('productos.show', $producto->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($idproducto)
    {
        $producto = Producto::findOrFail($idproducto);
        $producto->delete();
        return redirect()->route('productos.index');
    }

    public function getYoutubeEmbedUrl($url)
    {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        } else if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        } else {
            return '';
        }
        return 'https://www.youtube.com/embed/' . $youtube_id;
    }
}
