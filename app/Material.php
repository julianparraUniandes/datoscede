<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    //
    protected $table = 'material_relacionado';
    public function metadata()
    {
        return $this->belongsTo('App\Metadata', 'id_metadata');
    }
    protected $fillable = [
        'id_metadata','name', 'name_en', 'path','link','orden',
    ];
}
