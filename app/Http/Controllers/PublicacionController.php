<?php

namespace App\Http\Controllers;

use App\Publicacion;
use App\Metadata;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function show(Publicacion $publicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Publicacion $publicacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publicacion $publicacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publicacion $publicacion)
    {
        //
    }
    public function createPubli($id_meta)
    {
        $publicaciones = Publicacion::where('id_metadata', '=', $id_meta)->orderBy('orden', 'asc')->get();
        $nombreMeta = Metadata::select('name')->where('id', '=', $id_meta)->first();

        return view('admin.publicacion.create', compact('id_meta', 'nombreMeta', 'publicaciones'));
    }
    public function storePubli(Request $request)
    {
        $this->validate($request,[
            'nombre' => 'required|min:5',
            'nombre_en' => 'required|min:5',
            'texto' => 'required|min:5',
            'texto_en' => 'required|min:5',
            'orden' => 'required',
        ]);
         
        // if($request->hasFile('path')){
        //     $file_name = $request->file('path')->store('public/material');
        // } else{
        //     $file_name= "temp.jpg";
        // }  
        // //dd($request->id_metadata);
        // if($request->linkExterno == null){
        //     $link = "sin link";
        // }
        // else{
        //     $link = $request->linkExterno;
        // }
  
        Publicacion::create([
        'id_metadata' => $request->id_meta,
        'name' => $request->nombre,
        'name_en' => $request->nombre_en,
        'texto' => $request->texto,
        'texto_en' => $request->texto_en,
        // 'link' => $link,
        // 'path' => $file_name,
        'orden' => $request->orden,
        ]); 

        return redirect()->route('publicacion.createPubli',['id_meta'=>$request->id_meta])->with('success','Publicacion creada.');
    }

    public function destroyPubli(Request $request)
    {
        //
        //dd($request->id_micro);
        Publicacion::find($request->id_publi)->delete();

        return redirect()->route('publicacion.createPubli',['id_meta'=>$request->id_meta])->with('success','Publicacion eliminada.');
    }
}
