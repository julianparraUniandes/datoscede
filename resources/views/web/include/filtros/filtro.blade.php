
            {!! Form::open(['route'=>['catalogo.busqueda',''], 'method' => 'get', 'class'=>'', 'role'=> 'search']) !!}
            <div class="main-menu-item">
                <div class="input-group mb-2 mr-sm-2">
                    @if(Request::get('search') != null)                        
                        <input type="text" name="search" value="{{ Request::get('search') }}" placeholder="{{ __('filtro-meta-filtro-inicio') }}" class="typeahead form-control"/>	
                    @else 
                        {!! Form::text('search',null, ['class'=>'typeahead form-control', 'placeholder'=>__('home-buscador-texto') ] ) !!}
                    @endif
                    
                    <div class="input-group-append">
                        <button type="submit" class="btn btnHomeBusMain">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>            
            <div class="main-menu-item">
                {{ __('filtro-meta-tit-filtro-anos') }}
            </div>
            <div class="row main-menu-item">
                <div class="col-md-4">
                    <div class="btn-group btn-block"> 
                        <?php $last= date('Y'); ?>                       
                        <select class="form-control" name="ano_desde" id="ano_desde">                            
                            @if(Request::get('ano_desde') != null)
                                <option selected value="{{ Request::get('ano_desde') }}">{{ Request::get('ano_desde') }}</option>
                            @else
                                <option disabled selected>{{ __('filtro-meta-filtro-inicio') }} </option>
                            @endif
                            @for ($i = $metadataAnoMin->ano_desde; $i <= $last; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="btn-group btn-block">
                        <select class="form-control" name="ano_hasta" id="ano_hasta">
                            @if(Request::get('ano_hasta') != null)
                                <option selected value="{{ Request::get('ano_hasta') }}">{{ Request::get('ano_hasta') }}</option>
                            @else
                                <option disabled selected>{{ __('filtro-meta-filtro-fin') }} </option>   
                            @endif                            
                            @for ($i = $metadataAnoMin->ano_desde; $i <= $last; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-4 btn-block">
                    <button class="btn btn-light btn-block" type="submit">{{ __('filtro-meta-filtro-boton') }}</button>
                </div>
            </div>
            
            <div class="container">
                <div class=" main-menu-item">
                    {{ __('filtro-meta-tit-filtro-tos') }}
                </div>
                <div class="filtroCheck container accessFilter">
                    <div class="row">
                        <div class="col-md-1">
                            @if(Request::get('o') != null)
                                <input type="checkbox" aria-label="Checkbox for following text input" name="o" id="o" checked>
                            @else
                                <input type="checkbox" aria-label="Checkbox for following text input" name="o" id="o">
                            @endif
                        </div>
                        <div class="col-md-2">
                            <img src="{{ asset('img/cede-icon/tos/tos-bases-publicas.png') }}" alt="3" width="26" height="26">
                        </div>
                        <div class="col-md-8">
                            {{ __('filtro-meta-filtro-publico') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            @if(Request::get('p') != null)
                                <input type="checkbox" aria-label="Checkbox for following text input" name="p" id="p" checked>
                            @else
                                <input type="checkbox" aria-label="Checkbox for following text input" name="p" id="p">
                            @endif                           
                        </div>
                        <div class="col-md-2">
                            <img src="{{ asset('img/cede-icon/tos/tos-bases-privadas.png') }}" alt="3" width="26" height="26">
                        </div>
                        <div class="col-md-8">
                            {{ __('filtro-meta-filtro-restringido') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            @if(Request::get('s') != null)
                                <input type="checkbox" aria-label="Checkbox for following text input" name="s" id="s" checked>
                            @else
                                <input type="checkbox" aria-label="Checkbox for following text input" name="s" id="s">
                            @endif
                        </div>
                        <div class="col-md-2">
                            <img src="{{ asset('img/cede-icon/tos/tos-bases-en-sala.png') }}" alt="3" width="26" height="26">
                        </div>
                        <div class="col-md-8">
                            {{ __('filtro-meta-filtro-sala') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            @if(Request::get('e') != null)
                                <input type="checkbox" aria-label="Checkbox for following text input" name="e" id="e" checked>
                            @else
                                <input type="checkbox" aria-label="Checkbox for following text input" name="e" id="e">
                            @endif                        
                        </div>
                        <div class="col-md-2">
                            <img src="{{ asset('img/cede-icon/tos/tos-bases-externas.png') }}" alt="3" width="26" height="26">
                        </div>
                        <div class="col-md-8">
                            {{ __('filtro-meta-filtro-externo') }}
                        </div>
                    </div>
                </div>

                <!-- Checkbox for mobile. -->
                <!-- Inicio -->
                {{-- <div class="filtroCheckResponsive container accessFilter">

                        <div class="row row-cols-2">
                            <div class="col">
                                @if(Request::get('o') != null)
                                    <input type="checkbox" class="d-inline-block m-2 checkboxFiltro" aria-label="Checkbox for following text input" name="o" id="o" checked>
                                @else
                                    <input type="checkbox" class="d-inline-block m-2 checkboxFiltro" aria-label="Checkbox for following text input" name="o" id="o">
                                @endif
                                <img class="d-inline-block m-1" src="{{ asset('img/cede-icon/tos/tos-bases-publicas.png') }}"
                                    alt="3" width="26" height="26">
                                <p class="d-inline-block m-2">{{ __('filtro-meta-filtro-publico') }}</p>
                            </div>

                            <div class="col">
                                @if(Request::get('p') != null)
                                    <input type="checkbox" class="d-inline-block m-2 checkboxFiltro" aria-label="Checkbox for following text input" name="p" id="p" checked>
                                @else
                                    <input type="checkbox" class="d-inline-block m-2 checkboxFiltro" aria-label="Checkbox for following text input" name="p" id="p">
                                @endif   
                                <img class="d-inline-block m-1" src="{{ asset('img/cede-icon/tos/tos-bases-privadas.png') }}" alt="3" width="26" height="26">
                                <p class="d-inline-block m-2">{{ __('filtro-meta-filtro-restringido') }}</p>
                            </div>

                            <div class="col">
                                @if(Request::get('e') != null)
                                    <input type="checkbox" class="d-inline-block m-2 checkboxFiltro" aria-label="Checkbox for following text input" name="e" id="e" checked>
                                @else
                                    <input type="checkbox" class="d-inline-block m-2 checkboxFiltro" aria-label="Checkbox for following text input" name="e" id="e">
                                @endif    
                                <img class="d-inline-block m-1" src="{{ asset('img/cede-icon/tos/tos-bases-externas.png') }}"
                                    alt="3" width="26" height="26">
                                <p class="d-inline-block m-2">{{ __('filtro-meta-filtro-externo') }}</p>
                            </div>

                            <div class="col">
                                @if(Request::get('s') != null)
                                    <input type="checkbox" class="d-inline-block m-2 checkboxFiltro" aria-label="Checkbox for following text input" name="s" id="s" checked>
                                @else
                                    <input type="checkbox" class="d-inline-block m-2 checkboxFiltro" aria-label="Checkbox for following text input" name="s" id="s">
                                @endif
                                <img class="d-inline-block m-1" src="{{ asset('img/cede-icon/tos/tos-bases-en-sala.png') }}"
                                    alt="3" width="26" height="26">
                                <p class="d-inline-block m-2">{{ __('filtro-meta-filtro-sala') }}</p>
                            </div>
                        </div>
                    </div>
                <!-- Fin -->  --}}
                <div class="col-md-12 text-right main-menu-item">
                    <button class="btn btn-outline-secondary" type="submit">{{ __('filtro-meta-filtro-boton') }}</button>
                </div>
            </div>
            <hr>
            <div class="">
                <div class="main-menu-item">{{ __('filtro-meta-filtro-temas') }}</div>
                <div class="main-menu-item">
                    <div class="btn btn-group btn-block btnEspeDMA">
                        @if(Route::currentRouteName()=='catalogo.tema')
                        <select class="topic-input btn btn-outline-secondary" name="temas" id="temas">
                            <option value="" selected>Todos </option>  
                            @foreach($temas as $tema)
                                <option value='{{ $tema->id }}' {{$temaId->id == $tema->id  ? 'selected' : ''}}>{{ $tema->name}}</option>
                            @endforeach
                        </select>
                        @else
                        <select class="topic-input btn btn-outline-secondary" name="temas" id="temas">
                            @php $localet = session()->get('locale'); @endphp     
                            <option value="" disable selected>@if($localet=="en")All @else Todos @endif </option>
                            
                            @foreach($temas as $tema)
                                <option value='{{ $tema->id }}' {{ Request()->temas == $tema->id  ? 'selected' : ''}}>@if($localet=="en"){{ $tema->name_en }}@else {{ $tema->name }}@endif</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                </div>
                <div class="col-md-12 text-right main-menu-item">
                    <button class="btn btn-outline-secondary" type="submit">{{ __('filtro-meta-filtro-boton') }}</button>
                </div>
            </div>
            {!! Form::Close() !!}
            <hr>