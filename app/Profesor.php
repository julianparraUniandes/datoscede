<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    //
    protected $table = 'profesores';
    protected $fillable = [
        'name','lastName', 'email', 'publicado',
    ];
}
