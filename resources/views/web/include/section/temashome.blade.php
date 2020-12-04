<!-- Cards -->
<h1 class="container text-center text-primary ">{{ __('temas-home') }}</h1>
<div class="container container-main">
    <div class="row row-main">
        @foreach ($temas as $tema)
        <div class="col-md-4 col-sm-12 mobile-cards padding-cards row-main">
            <a href="/catalogo?temas={{$tema->id}}">
            <div class="main-items-1 text-center text-white">
                @php $locale = session()->get('locale'); @endphp                   
                <img class="img-fluid" src="{{ Storage::url($tema->imgPath )}}" alt="@if($locale=="en"){{ $tema->name_en }}@else {{ $tema->name }}@endif" title="@if($locale=="en"){{ $tema->name_en }}@else {{ $tema->name }}@endif">
                             
                <p class="labelIMG tipo-crimson">@if($locale=="en"){{ $tema->name_en }}@else {{ $tema->name }}@endif </p>
            </div>
            </a>
            <div class="label-card">

            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- End Cards -->
