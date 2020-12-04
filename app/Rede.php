<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rede extends Model
{
    //
    protected $fillable = [
        'name','link', 'imgPath',
    ];
}
