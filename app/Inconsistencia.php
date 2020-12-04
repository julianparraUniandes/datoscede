<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inconsistencia extends Model
{
    //
    protected $fillable = [
        'id_metadata','id_user', 'user_name', 'user_lastname','user_email','tipo_usr','nombre_metadata','version_metadata', 'texto',
    ];
}
