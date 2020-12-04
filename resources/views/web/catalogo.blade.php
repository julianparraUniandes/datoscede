@extends('layouts.main', ['title' =>  __('inicio-titulo') ])
@section('content')
<div class="father-banner-micro">
    <div class="container main-banner-micro text-center text-white">
        <div class="img-micro">
            <img class="img-fluid" src="{{ Storage::url($parametros->banner_catalogo )}}" alt="{{ __('filtro-meta-titulo') }}">
        </div>
        <div class="white-border-micro">
            {{ __('filtro-meta-titulo') }}
        </div>
    </div>
</div>
<div class="container contaEspe1">
    <!--Diseño - Pedir padding-->
    <br>
    <div class="text-center marginBotomText">
        <h1 class="mt-n4 text-uppercase">{{ __('bases-titulo') }}</h1>
    </div>
    <div class="row">
        <div class="col-md-4 main-menu main-menu-year mainBorderFilter">
            <div class="main-menu-item">
                <h6 class="main-menu-title titleCatMicro">{{ __('filtro-meta-titulo') }}</h6>
            </div>
            <div class="main-menu-item">
                <a href="/catalogo">{{ __('filtro-meta-ver-todas') }}</a>
            </div>
            @include('web.include.filtros.filtro')
            <div class="row justify-content-md-center main-menu-item">
                <p>{{ __('msg-solicitud-base') }}</p>
                <a href="https://economia.uniandes.edu.co/centros-de-investigacion/cede/centro-de-datos/bases-nuevas" class="btn btn-info" target="_blank">{{ __('solicitar-base') }}</a>
            </div>
        </div>
        <div class="col-md-8 main-menu-year conte-tabs">
            @include('web.include.filtros.letras')
            
            <div class="microdatos">
                @if(sizeof($metadatas) > 0)
                    @foreach ($metadatas as $metadata)
                    <div class="item-micro tipo-crimson">
                        @if($metadata->actualizable === 1)
                            <!--Actualizable-->
                            @switch($metadata->tos->id)
                                @case(1)
                                <img src="{{ asset('img/cede-icon/bases-actualizadas-publicas.png') }}" alt="{{ __('bases-actualizadas-publicas') }}" width="80" height="68">
                                    @break

                                @case(2)
                                <img src="{{ asset('img/cede-icon/bases-actualizadas-privadas.png') }}" alt="{{ __('bases-actualizadas-privadas') }}" width="80" height="68">
                                    @break

                                @case(3)
                                <img src="{{ asset('img/cede-icon/bases-actualizadas-externas.png') }}" alt="{{ __('bases-actualizadas-externas') }}" width="80" height="68">
                                    @break

                                @case(4)
                                <img src="{{ asset('img/cede-icon/bases-actualizadas-sala.png') }}" alt="{{ __('bases-actualizadas-sala') }}" width="80" height="68">
                                    @break

                                @default
                                <img src="img/1.png" alt="logo" width="100" height="100">
                            @endswitch
                        @else
                            <!--Estática-->
                            @switch($metadata->tos->id)
                            @case(1)
                            <img src="{{ asset('img/cede-icon/bases-estaticas-publicas.png') }}" alt="{{ __('bases-estaticas-publicas') }}" width="80" height="68">
                                @break

                            @case(2)
                            <img src="{{ asset('img/cede-icon/bases-estaticas-privadas.png') }}" alt="{{ __('bases-estaticas-privadas') }}" width="80" height="68">
                                @break

                            @case(3)
                            <img src="{{ asset('img/cede-icon/bases-estaticas-externas.png') }}" alt="{{ __('bases-estaticas-externas') }}" width="80" height="68">
                                @break

                            @case(4)
                            <img src="{{ asset('img/cede-icon/bases-estaticas-sala.png') }}" alt="{{ __('bases-estaticas-sala') }}" width="80" height="68">
                                @break

                            @default
                            <img src="img/1.png" alt="logo" width="100" height="100">
                        @endswitch
                        
                        @endif
                        
                        <div class="textContentDB">
                            <a href="{{ route('metadata.show',['slug'=>$metadata->slug, 'id'=>$metadata->id]) }}">
                            <h3 class="titleCatMicro">{{ $metadata->name }}</h3></a>
                            <p>{{ $metadata->descripcion }}</p>
                        </div>
                    </div>
                    @endforeach
                @else
                    <span>No se encontraron resultados asociados a su búsqueda</span>
                @endif
            </div>
            {{ $metadatas->links() }}
        </div>
    </div>
    @include('web.include.section.descargaListado')   
</div>
@endsection