<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Microdata;
use App\Metadata;
use Illuminate\Http\Request;

class MicrodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$microdata = Microdata::orderBy('id','desc')->paginate(5);
        return view('admin.microdata.create',['microdata'=> $microdata]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_meta)
    {
        //
        return view('admin.microdata.create');
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
            'id_metadata' => 'required',
            'nombre' => 'required|min:5',
            'nombre_en' => 'required|min:5',
            'path' => 'mimes:zip,rar',
            'linkExterno' => 'required|min:5',
            'orden' => 'required',
        ]);
         
        if($request->hasFile('path')){
            $file_name = $request->file('path')->store('public/microdatos');
        } else{
            $file_name= "temp.jpg";
        }  
  
        Microdata::create([
        'id_metadata' => $request->id_metadata,
        'nombre' => $request->nombre,
        'nombre_en' => $request->nombre_en,
        'linkExterno' => $request->linkExterno,
        'path' => $file_name,
        'orden' => $request->orden,
        ]); 

        return redirect()->route('microdata.index')->with('success','Microdata creada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Microdata  $microdata
     * @return \Illuminate\Http\Response
     */
    public function show(Microdata $microdata)
    {
        return view('microdata.show',compact('microdata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Microdata  $microdata
     * @return \Illuminate\Http\Response
     */
    public function edit(Microdata $microdata)
    {
         return view('admin.microdata.edit',compact('microdata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Microdata  $microdata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Microdata $microdata)
    {
        //
        $request->validate([
            'id_metadata' => 'required',
            'nombre' => 'required|min:5',
            'nombre_en' => 'required|min:5',
            'path' => 'required|mimes:zip,rar',
            'linkExterno' => 'required|min:5',
            'orden' => 'required',
        ]);
        if($request->hasFile('path')){
            
            if($microdata->path!=""){
                Storage::delete($microdata->path);
            }
            $microdata->path = $request->file('path')->store('public/microdatos');
        }  
       
        $microdata->nombre = $request->nombre;
        $microdata->nombre_en = $request->nombre_en;
        $microdata->linkExterno = $request->linkExterno;
        $microdata->orden = $request->orden;  
        $microdata->save();

        return redirect()->route('microdata.index')->with('success','microdata actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Microdata  $microdata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Microdata $microdata)
    {
        //
        $microdata->delete();

        return redirect()->route('microdata.index')->with('success','Microdata eliminada.');
    }

    //Override para uno usar Resource
    public function createMicro($id_meta)
    {
        $microdatas = Microdata::where('id_metadata', '=', $id_meta)->orderBy('orden', 'asc')->get();
        $nombreMeta = Metadata::select('name')->where('id', '=', $id_meta)->first();

        return view('admin.microdata.create', compact('id_meta', 'nombreMeta', 'microdatas'));
    }
    public function storeMicro(Request $request)
    {
        $this->validate($request,[
            'nombre' => 'required|min:5',
            'nombre_en' => 'required|min:5',
            'orden' => 'required',
        ]);
         
        if($request->hasFile('path')){
            $file_name = $request->file('path')->store('public/microdatos');
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
  
        Microdata::create([
        'id_metadata' => $request->id_meta,
        'nombre' => $request->nombre,
        'nombre_en' => $request->nombre_en,
        'linkExterno' => $link,
        'path' => $file_name,
        'orden' => $request->orden,
        ]); 

        return redirect()->route('microdata.createMicro',['id_meta'=>$request->id_meta])->with('success','Microdata creada.');
    }

    public function destroyMicro(Request $request)
    {
        //
        //dd($request->id_micro);
        Microdata::find($request->id_micro)->delete();

        return redirect()->route('microdata.createMicro',['id_meta'=>$request->id_meta])->with('success','Microdata eliminada.');
    }
}
