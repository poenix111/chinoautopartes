<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes; //add this line
class Product extends Model
{
    //
    use Sluggable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

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
