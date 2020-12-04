<?php

namespace App\Http\Controllers;

use App\Rede;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RedeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $redes = Rede::orderBy('id','desc')->paginate(10);
        return view('admin.rede.index',['redes'=> $redes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.rede.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd("asdasasfa");
        $this->validate($request,[
            'name' => 'required|min:3',
            'link' => 'required|min:3',
            'imgPath' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
         
        if($request->hasFile('imgPath')){
            $file_name = $request->file('imgPath')->store('public/img');
        } else{
            $file_name= "temp.jpg";
        }  
  
        Rede::create([
        'name' => $request->name,        
        'link' => $request->link,
        'imgPath' => $file_name,
        ]); 

        return redirect(route('rede.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rede  $rede
     * @return \Illuminate\Http\Response
     */
    public function show(Rede $rede)
    {
        //
        return view('admin.rede.show',['rede'=> $rede]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rede  $rede
     * @return \Illuminate\Http\Response
     */
    public function edit(Rede $rede)
    {
        //
        return view('admin.rede.edit', compact('rede'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rede  $rede
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rede $rede)
    {
        //
        $request->validate([
            'name' => 'required',
            'link' => 'required',          
        ]);
        if($request->hasFile('imgPath')){
            
            if($rede->imgPath!=""){
                Storage::delete($rede->imgPath);
            }
            $rede->imgPath = $request->file('imgPath')->store('public/img');
        }  
       
        $rede->name = $request->name;
        $rede->link = $request->link; 
        $rede->save();
        return redirect()->route('rede.index')->with('success','Profesor actualizado.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rede  $rede
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rede $rede)
    {
        //
        $rede->delete();

        return redirect()->route('rede.index')->with('success','Registro de profesor eliminado.');
    }
}
