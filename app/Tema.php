<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    public function metadatas()
    {
        return $this->belongsTo('App\Metadata','id_metadata','id');
    }
    
    protected $fillable = [
        'name', 'texto','name_en', 'texto_en', 'imgPath','icon', 'slug_es' , 'slug_en',
    ];
}
