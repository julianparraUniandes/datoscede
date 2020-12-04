<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    public function temas(){
        return $this->hasOne('App\Tema', 'id', 'id_tema');
    }

    public function tos(){
        return $this->hasOne('App\Tos', 'id', 'id_tos');
    }

    public function country(){
        return $this->hasOne('App\Country', 'id', 'pais');
    }

    public function microdatos(){
        return $this->hasMany('App\Microdata', 'id', 'id_metadata');
    }
    
    public function materiales(){
        return $this->hasMany('App\Material', 'id', 'id_metadata');
    }
    
    protected $fillable = [
        'name','name_en', 'ano_desde', 'ano_hasta','ano_texto','id_tema', 'pais', 'cobertura','periodicidad','fuente', 'patrocinador', 'keywords','descripcion','descripcion_en', 'id_tos','actualizable','fecha_actualizacion','publicada','busqueda', 'slug'
    ];
}
