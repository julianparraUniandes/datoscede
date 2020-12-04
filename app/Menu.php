<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $fillable = [
        'name', 'name_en', 'link', 'target', 'orden','main_menu', 'top_menu', 'footer_menu',
    ];
}
