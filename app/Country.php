<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function metadatas()
    {
        return $this->belongsTo('App\Metadata','pais','id');
    }
    protected $fillable = ['name'];
}
