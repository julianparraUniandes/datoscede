<div>
    @if(sizeof($microdatos) > 0)
    @php $locale = session()->get('locale'); @endphp      
        @foreach ($microdatos as $microdato)
        <div>
            <p class="textTabPub tipo-crimson">@if($locale=="en"){{ $microdato->nombre_en }}@else {{ $microdato->nombre }}@endif</p>
            @if($microdato->path != "temp.jpg")
                <a class=" btnDownloadPub tipo-crimson" href="{{ Storage::url($microdato->path )}}">Descargar</a>
            @endif
            @if($microdato->linkExterno != "sin link")
                <a class=" btnDownloadPub tipo-crimson" href="{{$microdato->linkExterno}}">Ir al sitio</a>
            @endif
        </div>
        @endforeach
    @else
        <span>No hay datos asociados</span>
    @endif

</div>