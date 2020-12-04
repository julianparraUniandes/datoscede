<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temas = Tema::orderBy('id','desc')->paginate(25);
        return view('admin.temas.index',['temas'=> $temas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.temas.create');
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
            'nombre' => 'required|min:3',
            'nombre_en' => 'required|min:3',            
            'texto' => 'required|min:3',
            'texto_en' => 'required|min:3',
            'imgPath' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
         
        if($request->hasFile('imgPath')){
            $file_name = $request->file('imgPath')->store('public/img/temas');
        } else{
            $file_name= "temp.jpg";
        }
        if($request->hasFile('icon')){
            $file_name_icon = $request->file('imgPath')->store('public/img/temas');
        } else{
            $file_name_icon= "temp.jpg";
        }  
   
  
        Tema::create([
        'name' => $request->name,        
        'texto' => $request->texto,
        'name_en' => $request->name_en,
        'texto_en' => $request->texto_en,
        'imgPath' => $file_name,
        'imgPath' => $file_name_icon,
        ]); 

        return redirect()->route('temas.index')->with('success','Tema creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function show(Tema $tema)
    {
        return view('temas.show',compact('tema'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function edit(Tema $tema)
    {
        return view('admin.temas.edit',compact('tema'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tema $tema)
    {
        //
        $request->validate([
            'name' => 'required',
            'texto' => 'required',
            'texto' => 'required|min:3',
            'texto_en' => 'required|min:3',
            'imgPath' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',               
        ]);
        if($request->hasFile('imgPath')){
            $request->validate([
                'imgPath' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',            
            ]);
            if($tema->imgPath!=""){
                Storage::delete($tema->imgPath);
            }
            $tema->imgPath = $request->file('imgPath')->store('public/img/temas');
        }
        if($request->hasFile('icon')){
            $request->validate([
                'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',            
            ]);
            if($tema->icon!=""){
                Storage::delete($tema->icon);
            }
            $tema->icon = $request->file('icon')->store('public/img/temas');
        }  
       
        $tema->name = $request->name;
        $tema->texto = $request->texto; 
        $tema->name_en = $request->name_en;
        $tema->texto_en = $request->texto_en; 
        $tema->slug_es = str_slug($request->name,'-');
        $tema->slug_en = str_slug($request->name_en,'-');
        $tema->save();

        return redirect()->route('temas.index')->with('success','Tema actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tema $tema)
    {
        $tema->delete();

        return redirect()->route('temas.index')->with('success','Tema eliminado.');
    }
}
