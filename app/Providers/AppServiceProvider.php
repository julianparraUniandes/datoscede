<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use App\Descarga;
use App\Menu;
use App\Metadata;
use App\Parametro;
use App\Rede;


use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Estadísticas
        $count = Metadata::where('publicada', 1)->count();
        View::share('totalBases', $count);
        $ultimaBase = Metadata::SELECT('name')->latest()->first();
        View::share('ultimaBase', $ultimaBase);
        $masDescargada = Descarga::select('nombre_metadata', DB::raw('count(*) as total'))
                                ->groupBy('nombre_metadata')
                                ->orderBy('total', 'desc')
                                ->first();
        View::share('masDescargada', $masDescargada);
        //Menu Principal
        $menus = Menu::where('main_menu', true)->orderBy('orden', 'ASC')->get();
        View::share('menus', $menus);
        //Menu top
        $top_menu = Menu::where('top_menu', true)->orderBy('orden', 'ASC')->get();
        View::share('top_menu', $top_menu);
        //Menu top
        $footer_menu = Menu::where('footer_menu', true)->orderBy('orden', 'ASC')->get();
        View::share('footer_menu', $footer_menu);
        //Parametros
        $parametros = Parametro::where('id',1)->first();
        View::share('parametros', $parametros);
        //Redes
        $redes = Rede::all();
        View::share('redes', $redes);
    }
}
