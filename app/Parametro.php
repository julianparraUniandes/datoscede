<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
    //
    protected $fillable = [
        'link_uniandes','link_cede','footer_direccion_1','footer_direccion_2',  'footer_telefono_1', 'footer_telefono_2','banner_home','banner_home_texto','banner_home_texto_en','banner_catalogo','banner_db_detalle', 'banner_login', 'banner_registro',
        'texto_salas_detalle_metadato','texto_salas_detalle_metadato_en','texto_inconsistencias','texto_inconsistencias_en', 'texto_restringidas_externos', 'texto_restringidas_externos_en',
    ];
}
