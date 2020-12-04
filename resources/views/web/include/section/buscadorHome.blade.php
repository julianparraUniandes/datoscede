{!! Form::open(['route'=>['catalogo.busqueda',''], 'method' => 'get', 'class'=>'', 'role'=> 'search']) !!}
<div class="main-menu-item">
    <label class="sr-only" for="formInputBaseSearch">Nombre de base</label>
    <div class="input-group mb-2 mr-sm-2">
        {!! Form::text('search',null, ['class'=>'typeahead form-control', 'placeholder'=>__('home-buscador-texto') ] ) !!}
        <div class="input-group-append">
            <div>
                <button type="submit" class="btn btnHomeBusMain">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</div>
{!! Form::Close() !!}