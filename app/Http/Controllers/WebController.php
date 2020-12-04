<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Tema;
use App\Metadata;
use App\Publicacion;
use App\Material;
use App\Country;
use Carbon\Carbon;
use App\Role;
use App\User;
use App\Microdata;
use App\Profesor;
use App\Sala;
use App\Autorization;

use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function index(){
        $temas = Tema::orderBy('name', 'asc')->get();
        $metadataAnoMin = Metadata::select('ano_desde')->orderBy('ano_desde', 'asc')->first();

        return view('web.index', compact('temas','metadataAnoMin'));
    }
    
 
    function metadatoDetalle($slug, $id){
        
        $countries = Country::all();
        $metadata = Metadata::where('id','=', $id)->where('publicada','=', 1)->first();
        $publicaciones = Publicacion::where('id_metadata', '=', $id)
                                    ->orderBy('orden', 'asc')
                                    ->get();
        $materiales = Material::where('id_metadata', '=', $id)
                                ->orderBy('orden', 'asc')
                                ->get();
        $microdatos = Microdata::where('id_metadata', '=', $id)
                                ->orderBy('orden', 'asc')
                                ->get();
        
        $profesores = Profesor::where('publicado',true)->get();;
        $salas = Sala::where('publicado', '=', 1) ->get();
        $autorizacion = null;
        if(Auth::user()){
            $roleUsuario = DB::table('role_user')
            ->where('user_id','=', Auth::user()->id)
            ->first();

            $autorizacion = Autorization::where('metadata_id', '=', $id)
                                    ->where('user_id', '=', Auth::user()->id)
                                    ->where("created_at",">", Carbon::now()->subMonths(6))
                                    ->first();
                                    
            if(Auth::user()->full_data != null){
                $datos_completos = true;
            }else{
                $datos_completos = false;
            }
        }
        else{
            $roleUsuario = 0;
            $datos_completos = false;
        }
        if($metadata != null){
            Metadata::where('id', $id)
                ->update(['vistas'=> DB::raw('vistas+1'), 
                'last_count_increased_at' => Carbon::now()]);
            return view('web.metadato',compact('metadata','publicaciones', 'materiales', 'countries', 'roleUsuario','datos_completos','microdatos', 'profesores', 'salas','autorizacion'));
        }
        else
            return abort(404);  
    }


    function updateUserData(Request $request){ 
        $role_user_estudiante_eco = Role::where('name','Estudiante Facultad')->first();
        $roleUsuario = DB::table('role_user')
            ->where('user_id','=', Auth::user()->id)
            ->first();
        $request->validate([
            'facultad' => 'required',
            'tipo' => 'required',
            'country' => 'required',
            'city' => 'required',            
        ]);
        if($request->tipo != "Estudiante"){
            $programa = "N/A";
            $doble_programa = "N/A";
        }
        else{
            $programa = $request->programa;
            $doble_programa = $request->doble_programa;
        }
        $user = User::updateOrCreate(
            [
                'id' => Auth::id()
            ],
            [
                'facultad' => $request->facultad,
                'tipo_usr' =>  $request->tipo,
                'programa' => $programa,
                'doble_programa' => $doble_programa,
                'country' => $request->country,
                'depto' => $request->depto,
                'city' => $request->city,
                'full_data' => true,
            ]
        );
        $tipo_usuario = $request->tipo;
        $facultad = $request->facultad;
        $programa = $request->programa;
        $doble_programa = $request->doble_programa;
        if($tipo_usuario == "Estudiante"){
            if($facultad == "Facultad de Economía" || $programa == "Economía" || $doble_programa == "Economía"){
                if($roleUsuario->role_id != 1 || $roleUsuario->role_id != 2){
                    $user->roles()->detach($roleUsuario->role_id);
                    $user->roles()->attach($role_user_estudiante_eco);
                }
            } 
        }      
        return redirect()->back()->with('success','Registro de datos completo.')->with('tab','descarga');
    }
    public function sala(){
        $salas = Sala::get();
        return view('web.salas', compact('salas'));
    }   
}
