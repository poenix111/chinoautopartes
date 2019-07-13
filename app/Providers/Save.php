<?php
namespace App\Providers;

use DateTime;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class Save
{
    public  static function  guardar($file)
    {

       
        $nombre = $file->getClientOriginalName();
        $now = new DateTime();
        $terminacion = '.' . Str::after($nombre, '.');
        $nombre = Str::before($nombre, '.');
        $nombre = $nombre . $now->format('YmdHis') . $terminacion;

  
        Storage::disk('public/')->put($nombre,  \File::get($file));

        $path = url('storage/' . $nombre);

        /* $marca->image = App\Providers\Save::guardar($file, 'marcas'); */



        return $path;
    }
}
