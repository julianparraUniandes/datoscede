<?php

namespace App\Http\Controllers;

use App\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesores = Profesor::orderBy('id','desc')->paginate(10);
        return view('admin.profesor.index',['profesores'=> $profesores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profesor.create');
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
            'lastName' => 'required|min:5',
            'email' => 'required|min:10',
            'publicado' => 'required',
        ]);
        Profesor::create([
            'name' => $request['name'],
            'lastName' => $request['lastName'],
            'email' => $request['email'],
            'login' => $request['email'],
            'publicado' => $request['publicado'],
            ]);   
        return redirect(route('profesor.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show(Profesor $profesor)
    {
        return view('admin.profesor.show',['profesor'=> $profesor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function edit(Profesor $profesor)
    {
        return view('admin.profesor.edit', compact('profesor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profesor $profesor)
    {
        $request->validate([
            'name' => 'required|min:3',
            'lastName' => 'required|min:5',
            'email' => 'required|min:10',
            'publicado' => 'required',
        ]);
        $profesor->name = $request->name;
        $profesor->lastName = $request->lastName; 
        $profesor->email = $request->email; 
        $profesor->login = $request->email; 
        $profesor->publicado = $request->publicado; 
        $profesor->save();
        return redirect()->route('profesor.index')->with('success','Profesor actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profesor $profesor)
    {
        $profesor->delete();

        return redirect()->route('profesor.index')->with('success','Registro de profesor eliminado.');
    }
}
