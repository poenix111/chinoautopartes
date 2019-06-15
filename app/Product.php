<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    //
    use Sluggable;
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'nombre'
            ]
        ];
    }
    public function modelo()
    {
        return $this->belongsTo('App\Modelo', 'id_modelo');
    }

    public function marca()
    {
        return $this->belongsTo('App\Marca', 'id_marca');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Category', 'id_categoria');
    }
}
