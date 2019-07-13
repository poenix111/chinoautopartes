<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Marca;
use App\Modelo;
use App\Product;
use DateTime;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB;
use File;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->except(["show", "index"]);   //You get the idea
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::withoutTrashed()->paginate(15);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = Category::all();
        $modelos = Modelo::all();
        $marcas = Marca::all();

        $informacion = [];

        array_push($informacion, $categorias, $modelos, $marcas);
        return view('product.create', compact('informacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product = new Product;




        $file = $request->file('foto');

        $nombre = $file->getClientOriginalName();
        $now = new DateTime();
        $terminacion = '.' . Str::after($nombre, '.');
        $nombre = Str::before($nombre, '.');
        $nombre = $nombre . $now->format('YmdHis') . $terminacion;


        Storage::disk('public')->put($nombre,  \File::get($file));

        $path = url('storage/' . $nombre);

        $product->imagen = $path;
        $product->nombre = $request['nombre'];
        $product->año = $request['year'];
        $product->precio = $request['precio'];
        if ($request['nuevo'] == "1") {
            $product->nuevo = 1;
        } else {
            $product->nuevo = 0;
        }

        if ($request['garantia'] == "1") {
            $product->garantia = 1;
            $product->cantDias = $request['dias'];
        } else {
            $product->garantia = 0;
            $product->cantDias = 0;
        }
        $product->id_categoria = $request['categoria'];
        $product->id_modelo = $request['modelo'];
        $product->id_marca = $request['marca'];

        $product->save();

        return redirect('/product')->with('message', 'Producto creado');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //

        $product = Product::where('slug', $slug)->first();

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //

        $product = Product::find($id);
        $product->delete();

        return redirect('/product')->with('message', 'Producto borrado');;
    }

    public function destroy($id)
    {
        //realizando

        $product = Product::onlyTrashed()->find($id);
        if (File::exists($product->imagen)) {
            File::delete($product->imagen);
        }

        $product->forceDelete();
        return redirect('/product')->with('message', 'Producto borrado');;
    }

    public function borrados(){

        $products = Product::withTrashed()->whereNotNull('deleted_at')->paginate(15);

        return view('product.papelera', compact('products'));
    }
    public function restaurar($slug){

        $product = Product::withTrashed()->where('slug', $slug)->first();

        return view('product.showRestore', compact('product'));
    }

    public function restore($id)
    {


        Product::withTrashed()->find($id)->restore();
        return redirect('/product')->with('message', 'Producto restaurado');;
    }
}
