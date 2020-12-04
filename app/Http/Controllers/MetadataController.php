<?php

namespace App\Http\Controllers;

use DB;
use App\Metadata;
use App\Tema;
use App\Country;
use App\Tos;
use App\user;
use App\Exports\MetadataExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class MetadataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metadatas = Metadata::select('id', 'name', 'id_tos', 'ano_desde', 'ano_hasta', 'vistas', 'id_tema')->get();
        return view('admin.metadata.index',['metadatas'=> $metadatas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$countries = DB::table('countries')->get();
        $countries = Country::all();
        $temas = Tema::all();
        $tos = Tos::all();
        return view('admin.metadata.create', compact('countries', 'temas','tos'));
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
            'name_en' => 'required|min:3',
            'ano_desde' => 'required',
            'ano_hasta' => 'required',
            'ano_texto' => 'required|min:3',
            'id_tema' => 'required',
            'pais' => 'required',
            'cobertura' => 'required|min:3',
            'fuente' => 'required|min:3',
            'keywords' => 'required|min:3',
            'descripcion' => 'required|min:3',
            'descripcion_en' => 'required|min:3',
            'id_tos' => 'required',
            'version' => 'required',
            'publicada' => 'required'
        ]);
        Metadata::create([
            'name' => $request['name'],
            'name_en' => $request['name_en'],
            'ano_desde' => $request['ano_desde'],
            'ano_hasta' => $request['ano_hasta'],
            'ano_texto' => $request['ano_texto'],
            'id_tema' => $request['id_tema'],
            'pais' => $request['pais'],
            'cobertura' => $request['cobertura'],
            'periodicidad' => "NA",
            'fuente' => $request['fuente'],
            'patrocinador' => $request['patrocinador'],
            'keywords' => $request['keywords'],
            'descripcion' => $request['descripcion'],
            'descripcion_en' => $request['descripcion_en'],
            'id_tos' => $request['id_tos'],
            'actualizable' => 0,
            'version' => $request['actualizable'],
            'fecha_actualizacion' => $request['fecha_actualizacion'],
            'publicada' => $request['publicada'],
            'slug'=>str_slug($request['name'],'-'),
            'busqueda' => $request['name'].", ".$request['keywords'],
            ]);   
        return redirect(route('metadata.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Metadata  $metadata
     * @return \Illuminate\Http\Response
     */
    public function show(Metadata $metadata)
    {
        return view('admin.metadata.show',['metadata'=> $metadata]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Metadata  $metadata
     * @return \Illuminate\Http\Response
     */
    public function edit(Metadata $metadata)
    {
        $countries = Country::all(['id', 'name'])->pluck('name', 'id');      
        $temas = Tema::all(['id', 'name'])->pluck('name', 'id');
        $tos = Tos::all(['id', 'name'])->pluck('name', 'id');
        //dd($temas);
        return view('admin.metadata.edit', compact('metadata', 'countries','temas', 'tos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Metadata  $metadata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Metadata $metadata)
    {
        $request->validate([
            'name' => 'required|min:3',
            'name_en' => 'required|min:5',
            'ano_desde' => 'required',
            'ano_hasta' => 'required',
            'ano_texto' => 'required|min:3',
            'id_tema' => 'required',
            'pais' => 'required',
            'cobertura' => 'required|min:5',            
            'fuente' => 'required|min:3',
            'keywords' => 'required|min:10',
            'descripcion' => 'required|min:3',
            'descripcion_en' => 'required|min:5',
            'id_tos' => 'required',            
            'version' => 'required',
            'publicada' => 'required'
        ]);
        $metadata->name = $request->name;
        $metadata->name_en = $request->name_en; 
        $metadata->ano_desde = $request->ano_desde; 
        $metadata->ano_hasta = $request->ano_hasta;
        $metadata->ano_texto = $request->ano_texto;
        $metadata->id_tema = $request->id_tema; 
        $metadata->pais = $request->pais; 
        $metadata->cobertura = $request->cobertura; 
        $metadata->periodicidad = "NA";
        $metadata->fuente = $request->fuente; 
        $metadata->patrocinador = $request->patrocinador; 
        $metadata->keywords = $request->keywords; 
        $metadata->descripcion = $request->descripcion;
        $metadata->descripcion_en = $request->descripcion_en; 
        $metadata->id_tos = $request->id_tos; 
        $metadata->actualizable = 0; 
        $metadata->version = $request->version; 
        $metadata->fecha_actualizacion = $request->fecha_actualizacion;
        $metadata->publicada = $request->publicada;
        $metadata->slug = str_slug($request->name,'-');
        $metadata->busqueda = $request->name.", ".$request->keywords; 
        $metadata->save();
        return redirect()->route('metadata.index')->with('success','Metadata actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Metadata  $metadata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Metadata $metadata)
    {
        $metadata->delete();

        return redirect()->route('metadata.index')->with('success','Registro de metadata eliminada.');
    }
    public function eliminar_tildes($cadena)
    {

        //Codificamos la cadena en formato utf8 en caso de que nos de errores
        $cadena = utf8_encode($cadena);
    
        //Ahora reemplazamos las letras
        $cadena = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $cadena
        );
    
        $cadena = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $cadena );
    
        $cadena = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $cadena );
    
        $cadena = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $cadena );
    
        $cadena = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $cadena );
    
        $cadena = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C'),
            $cadena
        );
    
        return $cadena;
    }
    public function export() 
    {
        return Excel::download(new MetadataExport, 'Listado-bases-CEDE.xlsx');
    }
}
