<?php

namespace App\Http\Controllers;

use App\Descarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\DescargasExport;
use Maatwebsite\Excel\Facades\Excel;

class DescargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $descargas = Descarga::orderBy('id','desc')->get();

        return view('admin.descarga.index',['descargas'=> $descargas]);
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
     * @param  \App\Descarga  $descarga
     * @return \Illuminate\Http\Response
     */
    public function show(Descarga $descarga)
    {
        //
        return view('admin.descarga.show',['descarga'=> $descarga]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Descarga  $descarga
     * @return \Illuminate\Http\Response
     */
    public function edit(Descarga $descarga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Descarga  $descarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Descarga $descarga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Descarga  $descarga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Descarga $descarga)
    {
        //
    }

    public function nuevaDescarga(Request $request)
    {
        $request->validate([
            'motivo' => 'required',
        ]);
        $descarga = new Descarga();
        $descarga->motivo = $request->motivo;
        $descarga->id_metadata = $request->idDato;
        $descarga->nombre_metadata = $request->nombreDato;
        $descarga->version_metadata = $request->versionDato;
        $descarga->id_user = Auth::user()->id;
        $descarga->user_name = Auth::user()->name;
        $descarga->user_lastname = Auth::user()->lastName;
        $descarga->user_email = Auth::user()->email;
        $descarga->tipo_usr = Auth::user()->tipo_usr;
        $descarga->save();
        
        return redirect()->back()->with('vista','descargar')->with('tab','descarga');
        
    }
    public function export(Request $request) 
    {
        //$request->user()->authorizeRoles('admin');
        return Excel::download(new DescargasExport, 'Listado-descargas-CEDE.xlsx');
    }
}
