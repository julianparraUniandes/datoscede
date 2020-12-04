<?php

namespace App\Http\Controllers;

use App\Material;
use App\Metadata;
use Illuminate\Http\Request;

class MaterialController extends Controller
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
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        //
    }
    public function createMate($id_meta)
    {
        $materiales = Material::where('id_metadata', '=', $id_meta)->orderBy('orden', 'asc')->get();
        $nombreMeta = Metadata::select('name')->where('id', '=', $id_meta)->first();

        return view('admin.material.create', compact('id_meta', 'nombreMeta', 'materiales'));
    }
    public function storeMate(Request $request)
    {
        $this->validate($request,[
            'nombre' => 'required|min:5',
            'nombre_en' => 'required|min:5',
            'orden' => 'required',
        ]);
         
        if($request->hasFile('path')){
            $file_name = $request->file('path')->store('public/material');
        } else{
            $file_name= "temp.jpg";
        }  
        //dd($request->id_metadata);
        if($request->linkExterno == null){
            $link = "sin link";
        }
        else{
            $link = $request->linkExterno;
        }
  
        Material::create([
        'id_metadata' => $request->id_meta,
        'name' => $request->nombre,
        'name_en' => $request->nombre_en,
        'link' => $link,
        'path' => $file_name,
        'orden' => $request->orden,
        ]); 

        return redirect()->route('material.createMate',['id_meta'=>$request->id_meta])->with('success','Microdata creada.');
    }

    public function destroyMate(Request $request)
    {
        //
        //dd($request->id_micro);
        Material::find($request->id_mate)->delete();

        return redirect()->route('material.createMate',['id_meta'=>$request->id_meta])->with('success','Material relacionado eliminado.');
    }
}
