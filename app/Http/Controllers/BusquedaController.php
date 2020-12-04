<?php

namespace App\Http\Controllers;
use App\Metadata;
use App\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;


class BusquedaController extends Controller
{
    //
    public function filter(Request $request, Metadata $metadata)
    {
        
        $metadata = $metadata->newQuery();

        // Search for a user based on their name.
        if ($request->has('name')) {
            $metadata->where('name', $request->input('name'));
        }

        // Search for a user based on their company.
        if ($request->has('company')) {
            $user->where('company', $request->input('company'));
        }

        // Search for a user based on their city.
        if ($request->has('city')) {
            $user->where('city', $request->input('city'));
        }

        // Continue for all of the filters.

        // Get the results and return them.
        return $metadata->get();
    }
    public function busqueda(Request $request){

        $temas = Tema::all();
        $metadataAnoMin = Metadata::select('ano_desde')->orderBy('ano_desde', 'asc')->first();
 
        $query = Metadata::select('id', 'name', 'name_en', 'id_tos', 'slug', 'descripcion', 'descripcion_en')->where('publicada', '=', 1);

        /*
        *Buscador por nombre / etiqueta
        */
        
        if ($request->has('search') and $request->search != null) {
            $query->where('busqueda', 'LIKE','%' .$request->search. '%');
            // ->orWhere('keywords', 'LIKE','%' .$request->search. '%'); <---este OR es el puto problema!! AGREGAR EL NOMBRE DE LA DB A LOS KEY WORDS
        }
        /*
        *Filtro TOS
        */
        
        if($request->has('o') || $request->has('p') || $request->has('e')||$request->has('s'))
        {
            $tos = [];
            //Publico
            if ($request->has('o')) {            
                $tos[count($tos)] = 1;               
            }
            //Privadas
            if ($request->has('p')) {    
                $tos[count($tos)] = 2;           
            }
            //Externas
            if ($request->has('e')) {            
                $tos[count($tos)] = 3;     
            }
            //Sala
            if ($request->has('s')) {    
                $tos[count($tos)] = 4;             
            }
            //$query->orWhereIn('id_tos', $tos);
            $query->where(function ($query) use ($tos) {
                foreach ($tos as $tosito) {
                    $query->orWhere('id_tos', '=',$tosito);
                } });  
                //dd($query); 
        }
        
        
        /*
        *Filtro rango de años
        */
        if ($request->has('ano_desde')) {
            if ($request->has('ano_hasta')) {
            $query->whereBetween('ano_desde', array($request->ano_desde,$request->ano_hasta))
                ->whereBetween('ano_hasta', array($request->ano_desde,$request->ano_hasta));
            }
        }
             
        /*
        *Filtro TEMA
        */
        if ($request->has('temas')and $request->temas != null) {            
            $query->where('id_tema','=', $request->temas);
        } 
        
        $metadatas = $query->orderBy('name', 'asc')->paginate(12)->appends([
            
            'temas' => request('temas'),
            'search' => request('search'),
            'ano_desde' => request('ano_desde'),
            'ano_hasta' => request('ano_hasta'),
            'o' => request('o'),
            'p' => request('p'),
            'e' => request('e'),
            's' => request('s'),

        ]);

        return view('web.catalogo', compact('metadatas', 'temas', 'metadataAnoMin'));
    }
    public function autocomplete(Request $request){

        $data = Metadata::select("name")
                ->where("name","LIKE","%{$request->input('query')}%")
                ->where('publicada', '=', 1)
                ->get();

        return response()->json($data);
    }
    public function letra($letra){
        $temas = Tema::all();
        $metadataAnoMin = Metadata::select('ano_desde')->orderBy('ano_desde', 'asc')->first();
        $metadatas = Metadata::select('id', 'name', 'name_en', 'id_tos', 'slug', 'descripcion', 'descripcion_en')
                ->where('name', 'like', $letra.'%')
                ->where('publicada', '=', 1)
                ->paginate(20);

        return view('web.catalogo', compact('metadatas', 'temas', 'metadataAnoMin'));
    }

}
