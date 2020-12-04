<?php

namespace App\Http\Controllers;

use App\Parametro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParametroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $parametros = Parametro::latest()->paginate(10);
        
        return view('admin.parametros.index',compact('parametros'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.parametros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'link_uniandes' => 'required',
            'link_cede' => 'required',
            'footer_direccion_1' => 'required|min:3',
            'footer_direccion_2' => 'required|min:3',
            'footer_telefono_1' => 'required|min:3',
            'footer_telefono_2' => 'required|min:3',
            'banner_home' => 'required|min:3',
            'banner_home_texto' => 'required|min:3',
            'banner_home_texto_en' => 'required',
            'banner_catalogo' => 'required|min:3',
            'banner_db_detalle' => 'required|min:3',
            'banner_login' => 'required|min:3',
            'banner_registro' => 'required|min:3',
            'texto_salas_detalle_metadato' => 'required',
            'texto_salas_detalle_metadato_en' => 'required',
            'texto_inconsistencias' => 'required',
            'texto_inconsistencias_en' => 'required',
            'texto_restringidas_externos' => 'required',
            'texto_restringidas_externos_en' => 'required',
        ]);
         
        
  
        Requisito::create([
            'footer_direccion_1' => $request->footer_direccion_1,
            'footer_direccion_2' => $request->footer_direccion_2,
            'footer_telefono_1' => $request->footer_telefono_1,
            'footer_telefono_2' => $request->footer_telefono_2,
            'banner_home' => $request->banner_home,
            'banner_home_texto' => $request->banner_home_texto,
            'banner_catalogo' => $request->banner_catalogo,
            'banner_db_detalle' => $request->banner_db_detalle,
            'banner_login' => $request->banner_login,
            'banner_registro' => $request->banner_registro,
        ]); 

        return redirect()->route('parametros.index')->with('success','Parametro creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function show(Parametro $parametro)
    {
        return view('parametros.show',compact('parametro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function edit(Parametro $parametro)
    {
        return view('admin.parametros.edit',compact('parametro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parametro $parametro)
    {
        $request->validate([
            'link_uniandes' => 'required',
            'link_cede' => 'required',
            'footer_direccion_1' => 'required',
            'footer_direccion_2' => 'required',
            'footer_telefono_1' => 'required',
            'footer_telefono_2' => 'required',
            'banner_home' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner_home_texto' => 'required',
            'banner_home_texto_en' => 'required',
            'banner_catalogo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner_db_detalle' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner_login' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner_registro' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'texto_salas_detalle_metadato' => 'required',
            'texto_salas_detalle_metadato_en' => 'required',
            'texto_inconsistencias' => 'required',
            'texto_inconsistencias_en' => 'required',
            'texto_restringidas_externos' => 'required',
            'texto_restringidas_externos_en' => 'required',
        ]);
        if($request->hasFile('banner_home')){            
            if($parametro->banner_home!=""){
                Storage::delete($parametro->banner_home);
            }
            $parametro->banner_home = $request->file('banner_home')->store('public/img/banners');
        } 
        if($request->hasFile('banner_catalogo')){            
            if($parametro->banner_catalogo!=""){
                Storage::delete($parametro->banner_catalogo);
            }
            $parametro->banner_catalogo = $request->file('banner_catalogo')->store('public/img/banners');
        }
        if($request->hasFile('banner_db_detalle')){            
            if($parametro->banner_db_detalle!=""){
                Storage::delete($parametro->banner_db_detalle);
            }
            $parametro->banner_db_detalle = $request->file('banner_db_detalle')->store('public/img/banners');
        } 
        if($request->hasFile('banner_login')){            
            if($parametro->banner_login!=""){
                Storage::delete($parametro->banner_login);
            }
            $parametro->banner_login = $request->file('banner_login')->store('public/img/banners');
        }
        if($request->hasFile('banner_registro')){            
            if($parametro->banner_registro!=""){
                Storage::delete($parametro->banner_registro);
            }
            $parametro->banner_registro = $request->file('banner_registro')->store('public/img/banners');
        }
        
        $parametro->link_uniandes = $request->link_uniandes;
        $parametro->link_cede = $request->link_cede; 
        $parametro->footer_direccion_1 = $request->footer_direccion_1;
        $parametro->footer_direccion_2 = $request->footer_direccion_2; 
        $parametro->footer_telefono_1 = $request->footer_telefono_1;
        $parametro->footer_telefono_2 = $request->footer_telefono_2; 
        $parametro->banner_home_texto = $request->banner_home_texto;
        $parametro->banner_home_texto_en = $request->banner_home_texto_en;
        $parametro->texto_salas_detalle_metadato = $request->texto_salas_detalle_metadato;
        $parametro->texto_salas_detalle_metadato_en = $request->texto_salas_detalle_metadato_en; 
        $parametro->texto_inconsistencias = $request->texto_inconsistencias; 
        $parametro->texto_inconsistencias_en = $request->texto_inconsistencias_en; 
        $parametro->texto_restringidas_externos = $request->texto_restringidas_externos; 
        $parametro->texto_restringidas_externos_en = $request->texto_restringidas_externos_en;  
        $parametro->save();

        return redirect()->route('parametros.edit', ['id' => 1])->with('success','Parametros actualizados.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parametro $parametro)
    {
        //
    }
}
