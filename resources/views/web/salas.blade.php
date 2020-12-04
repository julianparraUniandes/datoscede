@extends('layouts.main')
@section('content')
<div class="container">
    <div class="text-center">
        <h1 class=" text-uppercase">{{ __('dato-detalle-sala-titulo') }}</h1>
    </div>
    @php $locale = session()->get('locale'); @endphp

    <p>@if($locale=="en"){!! $parametros->texto_salas_detalle_metadato_en !!}@else{!! $parametros->texto_salas_detalle_metadato !!}@endif </p>
</div>
<div class="container">
    @if(sizeof($salas) > 0)
    <p>Agende su consulta en las siguientes salas disponibles</p>
    <div class="row">
        @foreach ($salas as $sala)
        <div class="col-md-4">
            <h5>{{ $sala->name }}</h5>
            <a href="{{ $sala->link }}" target="_blank"><span>{{ $sala->link }}</span></a>
        </div>
        @endforeach
    </div>
    @else
    <p>No hay ninguna sala disponible</p>
    @endif
</div>

@endsection
@section('script')

@endsection