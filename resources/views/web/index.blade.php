@extends('layouts.main', ['title' =>  __('home-titulo') ])

@section('content')
<div class="father">
    <div class="text text-center text-white">
        <label class="titleHm">{{ __('home-titulo') }}</label>
        @php $locale = session()->get('locale'); @endphp
        <h3 class="titleHmText">@if($locale=="en"){!! $parametros->banner_home_texto_en !!}@else {!! $parametros->banner_home_texto !!}@endif</h3>
    </div>
    <div id="img-banner">
        <img src="{{ Storage::url($parametros->banner_home )}}" class="img-fluid" alt="{{ __('home-titulo') }}" title="{{ __('home-titulo') }}">
    </div>
</div>

<div class="filter">
    <div class="filter-1">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 main-menu">
                @include('web.include.section.buscadorHome')                 
            </div>
            <div class="col-md-4 "></div>
        </div>
    </div>    
    @include('web.include.section.descargaListado')  

    @include('web.include.section.temashome')
</div>
@endsection
@section('script')
<script type="text/javascript">

    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {

                return process(data);
            });
        }
    });

</script>
    
@endsection