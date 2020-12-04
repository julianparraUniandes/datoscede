<footer>
    <div class="footer1 ">
        <div class="container ">
            <div class="text-center footer1-title ">
                <h1>{{ __('estadisticas-titulo') }}</h1><br>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-4">
                    <div class="row itemRow1">
                        <div class="col-md-3 ">
                            <img src="{{ asset('img/estadistica1.png') }}" alt="logo " width="70 " height="70 ">
                        </div>
                        <div class="col-md-9">
                            <b>{{$totalBases}} {{ __('estadisticas-DB-disponibles') }}</b><br>                           
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row itemRow2">
                        <div class="col-md-3">
                            <img src="{{ asset('img/estadistica2.png') }}" alt="logo " width="70 " height="70 ">
                        </div>
                        <div class="col-md-9">
                            <b>{{ __('estadisticas-mas-descargada') }}</b><br>
                            <span>{{$masDescargada->nombre_metadata}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row itemRow3">
                        <div class="col-md-3">
                            <img src="{{ asset('img/estadistica3.png') }}" alt="logo " width="70 " height="70 ">
                        </div>
                        <div class="col-md-9">
                            <b>{{ __('estadisticas-mas-reciente') }}</b><br>
                            <span>{{$ultimaBase->name}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer2 ">
        <div class="container footer-text ">
            <div class="row justify-content-md-center ">
                <div class="col-md-3 footer2-sections ">
                    <div>
                        <a href="{{$parametros->link_uniandes}}"><img class="logo-footer" src="{{ asset('img/logo-andes-blanco.svg') }}" alt="logo"></a>
                    </div>
                    <div>
                        <span>{{$parametros->footer_direccion_1}}</span><br>
                        <span>{{$parametros->footer_direccion_2}}</span><br>
                        <span>{{$parametros->footer_telefono_1}}</span><br>
                        <span>{{$parametros->footer_telefono_2}}</span><br>
                    </div>
                </div>
                <div class="footer2-separator "></div>
                <div class="col-md-3 footer2-sections ">
                    <div class="text-light footer2-header-title ">
                        {{ __('footer-enlaces-rapidos') }}
                    </div>
                    @php $locale = session()->get('locale'); @endphp
                    <div>
                        @foreach($footer_menu as $menu_footer)
                            <div class="footer2-quicklinks ">
                                <a href="{{ $menu_footer->link }}" target="{{ $menu_footer->target }}" class="footer-text">@if($locale=="en"){{ $menu_footer->name_en }}@else {{ $menu_footer->name }}@endif</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="footer2-separator "></div>
                <div class="col-md-auto footer2-sections ">
                    <div class="text-light footer2-header-title ">
                        {{ __('footer-enlaces-rs') }}
                    </div>
                    <div>
                        @if(sizeof($redes) > 0)
                            @foreach ($redes as $rede)
                                <a href="{{ $rede->link }}" target="_blank" alt="{{ $rede->name }}">
                                    <img class="footer2-social-link " src="{{ Storage::url($rede->imgPath )}}" alt="{{ $rede->name }}" title="{{ $rede->name }}" height="50 ">
                                </a>
                            @endforeach
                        @else
                         <span>No hay datos</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="footer3 navbar navbar-expand-lg navbar-dark text-light ">
        <div class="container footer-text ">
            <div class="col-md-6 ">
                <span> Universidad de los Andes | Vigilada Mineducacion </span><br>
                <span> Reconocimiento como Universidad: Decreto 1297 del 30 de mayo de 1964. </span><br>
                <span> Reconocimiento personaría jurídica: Resolucion 28 del 23 de febrero de 1949 Minjusticia. </span>
            </div>
            <div class="col-md-6 text-right ">
                <span>&copy; - Derechos reservados Universidad de los Andes</span>
            </div>
        </div>
    </nav>
</footer>