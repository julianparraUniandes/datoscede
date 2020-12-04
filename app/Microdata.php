<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Microdata extends Model
{
    protected $table = 'microdata';
    public function metadata()
    {
        return $this->belongsTo('App\Metadata', 'id_metadata');
    }
    protected $fillable = [
        'id_metadata','nombre', 'nombre_en', 'path','linkExterno','orden',
    ];
}
