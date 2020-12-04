<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tos extends Model
{
    public function metadatas()
    {
        return $this->belongsTo('App\Metadata','id_tos','id');
    }
    protected $fillable = [
        'name', 'text','name_en', 'text_en',
    ];
}
