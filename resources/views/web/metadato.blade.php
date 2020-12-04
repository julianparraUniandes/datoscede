@extends('layouts.main', ['title' =>  $metadata->name ])
@section('content')
<div class="father-banner-micro">
    <div class="container main-banner-micro text-center text-white">
        <div class="img-micro">
            <img class="img-fluid" src="{{ Storage::url($parametros->banner_db_detalle )}}" alt="{{ __('dato-detalle-titulo') }}">
        </div>
        <div class="white-border-micro text-uppercase">
            {{ __('dato-detalle-titulo') }}
        </div>
    </div>
</div>
<div class="container">
        <div class="text-right">
            <a href="{{ URL::previous() }}" class="btn btn-outline-primary">{{ __('back-btn') }}</a>
        </div>
        <div class="database-dashboard">
            <div class="database-info">
                <div class="text-center">
                    <h1 id="metadato-title" class="text-uppercase">{{$metadata->name}}</h1>
                </div>
                <div class="database-data">
                    <div class="row justify-content-md-center">
                        <div class="col-md-3">
                            <img src="{{ Storage::url($metadata->temas->icon) }}" alt="{{$metadata->temas->name}}" width="180">

                        </div>
                        <div class="col-md-5">
                            <table class="database-data-info">
                                <tr>
                                    <td class="database-data-info-title">{{ __('dato-detalle-nombre') }}</td>
                                    <td>{{$metadata->name}}</td>
                                </tr>                                
                                <tr>
                                    <td class="database-data-info-title">{{ __('dato-detalle-privacidad') }}</td>
                                    <td>{{ $metadata->tos->name }}</td>
                                </tr>
                                <tr>
                                    <td class="database-data-info-title">{{ __('dato-detalle-fuente') }}</td>
                                    <td>{{$metadata->fuente}}</td>
                                </tr>
                                <tr>
                                    <td class="database-data-info-title">{{ __('dato-detalle-ano') }}</td>
                                    <td>{{$metadata->ano_texto}}</td>
                                </tr>                                
                                <tr>
                                    <td class="database-data-info-title">{{ __('dato-detalle-tema') }}</td>
                                    <td>{{$metadata->temas->name}}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="database-data-info">
                                <tr>
                                    <td class="database-data-info-title">{{ __('dato-detalle-pais') }}</td>
                                    <td>{{$metadata->pais}}</td>
                                </tr>
                                <tr>
                                    <td class="database-data-info-title">{{ __('dato-detalle-vistas') }}</td>
                                    <td>{{$metadata->vistas}}</td>
                                </tr>
                                @if($metadata->fecha_actualizacion != null)
                                <tr>
                                    <td class="database-data-info-title">{{ __('dato-detalle-publicado') }}</td>
                                    <td>{{Carbon\Carbon::parse($metadata->fecha_actualizacion)->isoFormat('MMMM d, YYYY')}}</td>
                                    
                                </tr>
                                @endif
                                <tr>
                                    <td class="database-data-info-title">{{ __('dato-detalle-version') }}</td>
                                    <td>{{$metadata->version}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Por favor revise el formulario y valide los datos.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            </div>
            <div class="database-actions">
                <nav>
                    @if ($message = Session::get('tab'))
                        <script>
                        function setFocusToTitle(){
                            document.getElementById("metadato-title").focus();
                        }
                        </script>
                        @if($message == "descarga" )
                            <div class="nav nav-tabs nav-fill " id="nav-tab" role="tablist">
                                <a class="nav-item nav-link button btn-outline-info tabsMicroData"
                                    id="nav-description-tab" data-toggle="tab" href="#nav-description" role="tab"
                                    aria-controls="nav-description" aria-selected="true">{{ __('dato-detalle-descripcion') }}</a>
                                <a class="nav-item nav-link button btn-outline-info tabsMicroData" id="nav-description-tab"
                                    data-toggle="tab" href="#nav-manual" role="tab" aria-controls="nav-description"
                                    aria-selected="true">{{ __('dato-detalle-manuales') }}</a>
                                <a class="nav-item nav-link button btn-outline-info tabsMicroData active" id="nav-microdata-tab"
                                    data-toggle="tab" href="#nav-microdata" role="tab" aria-controls="nav-microdata"
                                    aria-selected="false">{{ __('dato-detalle-descarga') }}</a>
                                <a class="nav-item nav-link button btn-outline-info tabsMicroData" id="nav-inconsistencies-tab"
                                    data-toggle="tab" href="#nav-inconsistencies" role="tab" aria-controls="nav-inconsistencies"
                                    aria-selected="false">{{ __('dato-detalle-inconsistencia') }}</a>
                                <a class="nav-item nav-link button btn-outline-info tabsMicroData" id="nav-releases-tab"
                                    data-toggle="tab" href="#nav-releases" role="tab" aria-controls="nav-releases"
                                    aria-selected="false">{{ __('dato-detalle-publicaciones') }}</a>
                            </div>
                        @else
                            <div class="nav nav-tabs nav-fill " id="nav-tab" role="tablist">
                                <a class="nav-item nav-link button btn-outline-info tabsMicroData"
                                    id="nav-description-tab" data-toggle="tab" href="#nav-description" role="tab"
                                    aria-controls="nav-description" aria-selected="true">{{ __('dato-detalle-descripcion') }}</a>
                                <a class="nav-item nav-link button btn-outline-info tabsMicroData" id="nav-description-tab"
                                    data-toggle="tab" href="#nav-manual" role="tab" aria-controls="nav-description"
                                    aria-selected="true">{{ __('dato-detalle-manuales') }}</a>
                                <a class="nav-item nav-link button btn-outline-info tabsMicroData" id="nav-microdata-tab"
                                    data-toggle="tab" href="#nav-microdata" role="tab" aria-controls="nav-microdata"
                                    aria-selected="false">{{ __('dato-detalle-descarga') }}</a>
                                <a class="nav-item nav-link button btn-outline-info tabsMicroData active" id="nav-inconsistencies-tab"
                                    data-toggle="tab" href="#nav-inconsistencies" role="tab" aria-controls="nav-inconsistencies"
                                    aria-selected="false">{{ __('dato-detalle-inconsistencia') }}</a>
                                <a class="nav-item nav-link button btn-outline-info tabsMicroData" id="nav-releases-tab"
                                    data-toggle="tab" href="#nav-releases" role="tab" aria-controls="nav-releases"
                                    aria-selected="false">{{ __('dato-detalle-publicaciones') }}</a>
                            </div>
                        @endif
                    @else
                    <div class="nav nav-tabs nav-fill " id="nav-tab" role="tablist">
                        <a class="nav-item nav-link button btn-outline-info active tabsMicroData"
                            id="nav-description-tab" data-toggle="tab" href="#nav-description" role="tab"
                            aria-controls="nav-description" aria-selected="true">{{ __('dato-detalle-descripcion') }}</a>
                        <a class="nav-item nav-link button btn-outline-info tabsMicroData" id="nav-description-tab"
                            data-toggle="tab" href="#nav-manual" role="tab" aria-controls="nav-description"
                            aria-selected="true">{{ __('dato-detalle-manuales') }}</a>
                        <a class="nav-item nav-link button btn-outline-info tabsMicroData" id="nav-microdata-tab"
                            data-toggle="tab" href="#nav-microdata" role="tab" aria-controls="nav-microdata"
                            aria-selected="false">{{ __('dato-detalle-descarga') }}</a>
                        <a class="nav-item nav-link button btn-outline-info tabsMicroData" id="nav-inconsistencies-tab"
                            data-toggle="tab" href="#nav-inconsistencies" role="tab" aria-controls="nav-inconsistencies"
                            aria-selected="false">{{ __('dato-detalle-inconsistencia') }}</a>
                        <a class="nav-item nav-link button btn-outline-info tabsMicroData" id="nav-releases-tab"
                            data-toggle="tab" href="#nav-releases" role="tab" aria-controls="nav-releases"
                            aria-selected="false">{{ __('dato-detalle-publicaciones') }}</a>
                    </div>
                    @endif                    
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade tabs-content-panel @if ($message == null) show active @endif" id="nav-description" role="tabpanel"
                        aria-labelledby="nav-description-tab">
                        <div class="tabs-content-title">
                            {{$metadata->name}}
                        </div>
                        <div class="tabs-content-text">
                            {{$metadata->descripcion}}
                        </div>
                    </div>
                    <div class="tab-pane fade tabs-content-panel" id="nav-manual" role="tabpanel"
                        aria-labelledby="nav-description-tab">
                        <div class="col-md-9">
                            <div class="tabs-content-title">
                                {{ __('dato-detalle-manuales') }}
                            </div>
                            <div class="tabs-content-text">
                                @if(sizeof($materiales) > 0)
                                @foreach ($materiales as $material)
                                <div>
                                    {{$material->name}}:
                                    @if($material->path == "temp.jpg")
                                    <a href="{{$material->link}}" target="_blank">{{ __('btn-descargar-archivo') }}</a>
                                    @else
                                    <a href="{{ Storage::url($material->path)}}">{{ __('btn-descargar-archivo') }}</a>
                                    @endif
                                </div>
                                @endforeach
                                @else
                                <div>
                                    {{ __('msg-no-manuales') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade tabs-content-panel overflow-auto" id="nav-releases" role="tabpanel" aria-labelledby="nav-releases-tab">
                        <div class="row">
                            <div class="col-md-12 tabs-content-text divPublicaciones">
                                 @if(sizeof($publicaciones) > 0)
                                        @foreach ($publicaciones as $publicacion)
                                        <div class="publicacion">
                                            {{$publicacion->name}}: {{$publicacion->texto}}
                                            
                                        </div>
                                        @endforeach
                                    @else
                                        {{ __('msg-no-publicaciones') }}
                                    @endif                                       
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade tabs-content-panel @if ($message == "descarga") show active @endif" id="nav-microdata" role="tabpanel" aria-labelledby="nav-microdata-tab">
                        @php $locale = session()->get('locale'); @endphp
                        @auth
                            @if($datos_completos == false) 
                                @include('web.include.section.descargadatos.completaDatos')
                            @else
                                @switch($metadata->tos->id)
                                @case(1)
                                        @if ($message = Session::get('vista'))
                                            @include('web.include.section.descargadatos.listadoDescarga')
                                        @else
                                            @include('web.include.section.descargadatos.motivo')
                                        @endif

                                    @break
                            
                                @case(2)
                                        {{-- Switch de roles --}}
                                        @switch($roleUsuario->role_id)
                                            {{-- Administrador --}}
                                            @case(1)
                                                    @if ($message = Session::get('vista'))
                                                        @include('web.include.section.descargadatos.listadoDescarga')
                                                    @else
                                                        @include('web.include.section.descargadatos.motivo')
                                                    @endif
                                                @break
                                            {{-- Profesor Facultad --}}
                                            @case(2)
                                                    @if ($message = Session::get('vista'))
                                                        @include('web.include.section.descargadatos.listadoDescarga')
                                                    @else
                                                        @include('web.include.section.descargadatos.motivo')
                                                    @endif
                                                @break
                                            {{-- Estudiante Facultad --}}
                                            @case(3)
                                                @if($autorizacion == null)
                                                    @include('web.include.section.descargadatos.solicitudEstudiante')
                                                @else
                                                    @switch($autorizacion->estado)
                                                        @case(0)
                                                            <span>{{ __('msg-solicitud-descarga') }}</span>
                                                            @break
                                                        @case(1)
                                                            @if ($message = Session::get('vista'))
                                                                @include('web.include.section.descargadatos.listadoDescarga')
                                                            @else
                                                                @include('web.include.section.descargadatos.motivo')
                                                            @endif
                                                            @break

                                                        @case(2)
                                                            @include('web.include.section.descargadatos.solicitudEstudiante')
                                                            @break
                                                        @default
                                                        <span>{{ __('msg-solicitud-descarga') }}</span>
                                                    @endswitch
                                                    
                                                @endif
                                                @break
                                            {{-- Uniandinos no eco --}}
                                            @case(4)
                                                @if($autorizacion == null)
                                                    @include('web.include.section.descargadatos.solicitudAdmon')
                                                @else
                                                    @switch($autorizacion->estado)
                                                        @case(0)
                                                            <span>{{ __('msg-solicitud-descarga') }}</span>
                                                            @break
                                                        @case(1)
                                                            @if ($message = Session::get('vista'))
                                                                @include('web.include.section.descargadatos.listadoDescarga')
                                                            @else
                                                                @include('web.include.section.descargadatos.motivo')
                                                            @endif
                                                            @break

                                                        @case(2)
                                                            @include('web.include.section.descargadatos.solicitudAdmon')
                                                            @break
                                                        @default
                                                        <span>{{ __('msg-solicitud-descarga') }}</span>
                                                    @endswitch        
                                                @endif
                                                @break

                                            @case(5)
                                                <div class="container">
                                                <p>@if($locale=="en"){!!  $parametros->texto_restringidas_externos_en !!}@else {!!  $parametros->texto_restringidas_externos !!}@endif </p>
                                                </div>
                                                @break                                    

                                            @default
                                                <div class="container">
                                                    <p>@if($locale=="en"){!! $parametros->texto_restringidas_externos_en !!}@else {!! $parametros->texto_restringidas_externos !!}@endif </p>
                                                </div>
                                        @endswitch
                                        {{-- End Switch de roles --}}
                                    @break

                                @case(3)
                                        @if ($message = Session::get('vista'))
                                            @include('web.include.section.descargadatos.listadoDescarga')
                                        @else
                                            @include('web.include.section.descargadatos.motivo')
                                        @endif
                                    @break

                                @case(4)
                                    @include('web.include.section.descargadatos.reservaSala')
                                    @break
                            
                                @default
                                    <span>{{ __('msg-datos-completos') }}</span>
                                @endswitch
                                
                            @endif
                        @else
                            @include('web.include.section.descargadatos.login')
                        @endauth 

                    </div>
                    <div class="tab-pane fade text-center tabs-content-panel @if ($message == "incon") show active @endif" id="nav-inconsistencies" role="tabpanel" aria-labelledby="nav-inconsistencies-tab">
                        @auth
                            @include('web.include.section.reporteIncon.formulario')
                        @else
                            @include('web.include.section.descargadatos.login')
                        @endauth  
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('web.include.section.descargaListado')  
</main>
@endsection
@section('script')

<script>
    jQuery(document).ready(function(){
      $("#country").change(function() {
          if($(this).val() == "Colombia"){    
              $("#depto").prop('disabled', false);
          }else{
            $('#depto').prop('disabled', 'disabled');
          }
      });
    });
    </script>

<script>
    jQuery(document).ready(function(){
      $("#tipo").change(function() {
          if($(this).val() == "Estudiante"){    
              $("#programa").prop('disabled', false);
              $("#doble_programa").prop('disabled', false);
          }else{
            $('#programa').prop('disabled', 'disabled');
            $('#doble_programa').prop('disabled', 'disabled');
          }
      });
    });
    </script>
@endsection