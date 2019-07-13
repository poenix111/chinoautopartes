<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Marca;
use DateTime;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB;
use App\Http\Middleware\RedirectIfAuthenticated;
class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $marcas =DB::table('marcas')->paginate(5);
        // $users = DB::table('users')->paginate(15);

        return view('marca.index', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('marca.create');
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
        $marca = new Marca;
        $marca->nombre = $request['nombre'];

        $file = $request->file('foto');

        $nombre = $file->getClientOriginalName();
        $now = new DateTime();
        $terminacion = '.' . Str::after($nombre, '.');
        $nombre = Str::before($nombre, '.');
        $nombre = $nombre . $now->format('YmdHis') . $terminacion; 

        
        Storage::disk('public')->put($nombre,  \File::get($file));

        $path = url('storage/' . $nombre);
   
        
        /* $marca->image = App\Providers\Save::guardar($file); */
        $marca->image = $path;
        $marca->save();
        return redirect('/marca')->with('message', 'Marca creada');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
