<br>
<div>
    @php $character = range('A','Z');  @endphp
    @if(request('temas') != null || request('search') != null || request('ano_desde') != null || request('o') != null|| request('p') != null|| request('e') != null|| request('s') != null)
        
    @else
        @foreach($character as $alphabet)
            <a href="{{ route('catalogo.letra',['letra'=>$alphabet]) }}" class="letter-index">{{$alphabet}}</a>
        @endforeach
    @endif
</div>
<br>