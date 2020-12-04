<?php

namespace App\Http\Controllers;

use DB;
use App\Autorization;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Menu;
use App\Rede;
use App\Profesor;
use Illuminate\Support\Facades\Auth;

class AutorizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $autorizations = Autorization::all();
        return view('admin.autorization.index',['autorizations'=> $autorizations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('admin.autorization.create');
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
     * @param  \App\Autorization  $autorization
     * @return \Illuminate\Http\Response
     */
    public function show(Autorization $autorization)
    {
        //
        return view('autorization.show',compact('autorization'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Autorization  $autorization
     * @return \Illuminate\Http\Response
     */
    public function edit(Autorization $autorization)
    {
        //
        return view('admin.autorization.edit',compact('autorization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Autorization  $autorization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autorization $autorization)
    {
        //
        $request->validate([
            'estado' => 'required',
        ]);
       
        $autorization->estado = $request->estado;
        $autorization->save();

        return redirect()->route('autorization.index')->with('success','Autorización actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Autorization  $autorization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autorization $autorization)
    {
        
    }

    public function nuevaSolicitudProfesor(Request $request)
    {
        $request->validate([
            'profesor' => 'required',
            'descripcion_proy' => 'required',
        ]);
        $profesor = Profesor::where('login', $request->profesor)->first();
        $solicitud = new Autorization();
        $solicitud->metadata_id = $request->idDato;
        $solicitud->nombre_metadata = $request->nombreDato;
        $solicitud->descripcion = $request->descripcion_proy;
        $solicitud->mail_auth = $request->profesor;
        $solicitud->nombre_profesor = $profesor->name." ".$profesor->lastName;
        $solicitud->user_id = Auth::user()->id;
        $solicitud->name = Auth::user()->name;
        $solicitud->surname = Auth::user()->lastName;
        $solicitud->email = Auth::user()->email;
        $solicitud->tipo_user = Auth::user()->tipo_usr;
        $solicitud->programa = Auth::user()->programa;
        $solicitud->doble_programa = Auth::user()->doble_programa;
        $solicitud->estado = 0;
        $solicitud->fecha_solicitud = Carbon::now();
        $solicitud->uuid = sha1(time());
        $solicitud->save();


        $arreglo_solicitud = $solicitud->toArray();
        //Correo al profesor
        \Mail::send('mails.solicitud_profesor', $arreglo_solicitud, function($message) use ($arreglo_solicitud)
        {
            $message->from('datoscede@uniandes.edu.co', "catalogodedatos.uniandes.edu.co");
            $message->subject("Solicitud a base de datos restringida - Profesor");
            $message->to($arreglo_solicitud['mail_auth']);
        });
        //Correo al usuario
        \Mail::send('mails.notificacion_de_profesor', $arreglo_solicitud, function($message) use ($arreglo_solicitud)
        {
            $message->from('datoscede@uniandes.edu.co', "catalogodedatos.uniandes.edu.co");
            $message->subject("CEDE - Solicitud de acceso a base de datos");
            $message->to($arreglo_solicitud['email']);
        });
        
        return redirect()->back()->with('vista','descargar')->with('tab','descarga');
        
    }

    public function nuevaSolicitudAdmin(Request $request)
    {
        $request->validate([
            'descripcion_proy' => 'required',
            'tipo_proy' => 'required',
        ]);
        $texto_proy = $request->tipo_proy . ": " . $request->descripcion_proy;
        $solicitud = new Autorization();
        $solicitud->metadata_id = $request->idDato;
        $solicitud->nombre_metadata = $request->nombreDato;
        $solicitud->descripcion = $texto_proy;
        $solicitud->mail_auth = "datoscede@uniandes.edu.co";
        $solicitud->user_id = Auth::user()->id;
        $solicitud->name = Auth::user()->name;
        $solicitud->surname = Auth::user()->lastName;
        $solicitud->email = Auth::user()->email;
        $solicitud->tipo_user = Auth::user()->tipo_usr;
        $solicitud->programa = Auth::user()->programa;
        $solicitud->doble_programa = Auth::user()->doble_programa;
        $solicitud->estado = 0;
        $solicitud->fecha_solicitud = Carbon::now();
        $solicitud->uuid = sha1(time());
        $solicitud->save();

        $arreglo_solicitud = $solicitud->toArray();

        \Mail::send('mails.solicitud_admin', $arreglo_solicitud, function($message) use ($arreglo_solicitud)
        {
            $message->from('datoscede@uniandes.edu.co', "catalogodedatos.uniandes.edu.co");
            $message->subject("Solicitud a base de datos restringida - Administrador");
            $message->to("datoscede@uniandes.edu.co");
        });
        //Correo al usuario
        \Mail::send('mails.notificacion_de_admin', $arreglo_solicitud, function($message) use ($arreglo_solicitud)
        {
            $message->from('datoscede@uniandes.edu.co', "catalogodedatos.uniandes.edu.co");
            $message->subject("CEDE - Solicitud de acceso a base de datos");
            $message->to($arreglo_solicitud['email']);
        });
        
        return redirect()->back()->with('vista','descargar')->with('tab','descarga');
        
    }


    function autorizaSolicitud($uuid, $user_id){
        $menus = Menu::orderBy('orden', 'ASC')->get();
        $redes = Rede::all(); 
        $currentTimestamp = Carbon::now()->toDateTimeString();
        Autorization::where('uuid', $uuid)
        ->where('user_id', $user_id)
        ->update(['estado' => 1]);
            
            

        return view('web.autoriza',compact( 'menus','redes'))->with('success','Autorización concedida.');
    }

    function niegaSolicitud($uuid, $user_id){
        $menus = Menu::orderBy('orden', 'ASC')->get();
        $redes = Rede::all(); 

        Autorization::where('uuid', $uuid)
        ->where('user_id', $user_id)
        ->update(['estado' => 2]);

        return view('web.autoriza',compact( 'menus','redes'))->with('success','Autorización Negada.');
    }

}
