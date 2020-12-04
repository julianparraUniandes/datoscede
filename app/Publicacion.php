<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = 'publicaciones';
    public function metadata()
    {
        return $this->belongsTo('App\Metadata', 'id_metadata');
    }
    protected $fillable = [
        'id_metadata','name', 'name_en', 'texto', 'texto_en', 'orden',
    ];
}
