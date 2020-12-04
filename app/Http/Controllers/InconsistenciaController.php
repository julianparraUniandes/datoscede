<?php

namespace App\Http\Controllers;

use App\Inconsistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InconsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $inconsistencias = Inconsistencia::orderBy('id','desc')->get();

        return view('admin.inconsistencia.index',['inconsistencias'=> $inconsistencias]);
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
     * @param  \App\Inconsistencia  $inconsistencia
     * @return \Illuminate\Http\Response
     */
    public function show(Inconsistencia $inconsistencia)
    {
        
        return view('admin.inconsistencia.show',['inconsistencia'=> $inconsistencia]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inconsistencia  $inconsistencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Inconsistencia $inconsistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inconsistencia  $inconsistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inconsistencia $inconsistencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inconsistencia  $inconsistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inconsistencia $inconsistencia)
    {
        //
    }
    public function nuevaInconsistencia(Request $request)
    {
        $request->validate([
            'texto' => 'required',
        ]);
        $inconsistencia = new Inconsistencia();
        $inconsistencia->texto = $request->texto;
        $inconsistencia->id_metadata = $request->idDato;
        $inconsistencia->nombre_metadata = $request->nombreDato;
        $inconsistencia->version_metadata = $request->versionDato;
        $inconsistencia->id_user = Auth::user()->id;
        $inconsistencia->user_name = Auth::user()->name;
        $inconsistencia->user_lastname = Auth::user()->lastName;
        $inconsistencia->user_email = Auth::user()->email;
        $inconsistencia->tipo_usr = Auth::user()->tipo_usr;
        $inconsistencia->save();

        $arreglo_inconsistencia = $inconsistencia->toArray();
        //Correo al admin
        \Mail::send('mails.autorization_noti_to_admin', $arreglo_inconsistencia, function($message) use ($arreglo_inconsistencia)
        {
            $message->from('datoscede@uniandes.edu.co', "catalogodedatos.uniandes.edu.co");
            $message->subject("Inconsistencia - CEDE - Catálogo de Datos");
            $message->to('datoscede@uniandes.edu.co');
        });
        //Correo al usuario
        \Mail::send('mails.autorization_noti_to_usr', $arreglo_inconsistencia, function($message) use ($arreglo_inconsistencia)
        {
            $message->from('datoscede@uniandes.edu.co', "catalogodedatos.uniandes.edu.co");
            $message->subject("Reporte Inconsistencia - CEDE - Catálogo de Datos");
            $message->to($arreglo_inconsistencia['user_email']);
        });
      
        return redirect()->back()->with('vista','descargar')->with('tab','descarga');
        
    }
}
