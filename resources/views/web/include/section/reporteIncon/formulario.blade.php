<div class="container">
        <form method="POST" action="{{ route('complete.incon') }}">
            @csrf
            <h5 class="text-center tipo-crimson">{{ __('dato-detalle-inconsistencia') }}</h5>
            <p>@if($locale=="en"){!! $parametros->texto_inconsistencias_en !!}@else {!! $parametros->texto_inconsistencias !!}@endif </p>
            <div class="input-group mb-3">
                <input id="idDato" name="idDato"  type="hidden" value="{{$metadata->id}}" >
                <input id="nombreDato" name="nombreDato" type="hidden" value="{{$metadata->name}}" >
                <input id="versionDato" name="versionDato" type="hidden" value="{{$metadata->version}}" >
                <textarea type="text" class="form-control" id="texto" name="texto" placeholder="" aria-label="Motivo de descarga" aria-describedby="basic-addon1" required></textarea>
            </div>
            <div class="row mb-3 justify-content-end">
                <button type="submit" class="btn btn-primary">
                    {{ __('btn-enviar') }}
                </button>
            </div>
        </form>
</div>