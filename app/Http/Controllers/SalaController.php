<?php

namespace App\Http\Controllers;

use App\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salas = Sala::orderBy('id','desc')->paginate(25);
        return view('admin.sala.index',['salas'=> $salas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sala.create');
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
            'name' => 'required|min:3',
            'link' => 'required|min:5',
            'publicado' => 'required',
        ]);
        Sala::create([
            'name' => $request['name'],
            'link' => $request['link'],
            'publicado' => $request['publicado'],
            ]);   
        return redirect(route('sala.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function show(Sala $sala)
    {
        return view('admin.sala.show',['sala'=> $sala]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function edit(Sala $sala)
    {
        return view('admin.sala.edit', compact('sala'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sala $sala)
    {
        $request->validate([
            'name' => 'required|min:3',
            'link' => 'required|min:5',
            'publicado' => 'required',
        ]);
        $sala->name = $request->name;
        $sala->link = $request->link; 
        $sala->publicado = $request->publicado; 
        $sala->save();
        return redirect()->route('sala.index')->with('success','Sala actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sala $sala)
    {
        $sala->delete();

        return redirect()->route('sala.index')->with('success','Registro de sala eliminado.');
    }
}
