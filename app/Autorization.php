<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autorization extends Model
{
    //
    protected $fillable = [
        'name','surname', 'email', 'tipo_user','programa','doble_programa','nombre_profesor','mail_auth','descripcion', 'metadata_id','user_id','nombre_metadata','estado','fecha_solicitud', 'uuid', 'fecha_respuesta',
    ];
}
