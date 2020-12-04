{!! Form::open(['route'=>['catalogo.busqueda','busqueda'], 'method' => 'get', 'class'=>'', 'role'=> 'search']) !!}
<div class="main-menu-item text-white ">
    Mostrar bases entre
</div>
<div class="row main-menu-item ">
    <div class="col-md-4 ">
        <div class="btn-group btn-block ">
            <?php $last= date('Y'); ?>                       
            <select class="dropdown-menu-left" name="ano_desde" id="ano_desde">
                <option disabled selected>Desde </option>   
             @for ($i = $metadataAnoMin->ano_desde; $i <= $last; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
            </select>
        </div>
    </div>
    <div class="col-md-4 ">
        <div class="btn-group btn-block ">
            <select class="dropdown-menu-left" name="ano_hasta" id="ano_hasta">
                <option disabled selected>Hasta </option>   
                @for ($i = $metadataAnoMin->ano_desde; $i <= $last; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
    </div>
    <div class="col-md-4 btn-block ">
        <button class="btn btn-light btn-block " type="submit">Aplicar</button>
    </div>
</div>
{!! Form::Close() !!}