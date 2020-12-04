<header>
    <div class="main-navs">
        <nav class="top">
            <div class="container nav-top">
                <a class="volver" href="{{$parametros->link_uniandes}}">{{ __('link-uniandes') }}</a>
                @php $locale = session()->get('locale'); @endphp
                <ul class="ul-nav-top">
                    @auth
                    <li><span class="text-light">Hola {{ Auth::user()->name }}</span></li>
                    @if (auth()->user()->authorizeRoles('admin'))
                    <li class="especialLineMid"><a href="/admin/metadata">Gestor</a></li>
                    @endif                   
                    <li class="especialLineMid"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">{{ __('Logout') }}</a></li>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                        {{ csrf_field() }}
                    </form>
                @else
                    <li class="especialLineMid"><a href="{{ route('azure.login') }}">{{ __('login-uniandes') }}</a></li>
                    <li class="especialLineMid"><a href="{{ route('login') }}">{{ __('login-externos') }}</a></li>
                    @if (Route::has('register'))
                        <li class="especialLineMid"><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        
                    @endif
                @endauth  
                    {{-- //menu top --}}
                    @if(sizeof($top_menu) > 0)
                        @foreach ($top_menu as $menu_top)
                        <li class="especialLineMid"><a href="{{ $menu_top->link }}"  target="{{ $menu_top->target }}">@if($locale=="en"){{ $menu_top->name_en }}@else {{ $menu_top->name }}@endif</a></li>
                        @endforeach                    
                    @endif
                    @switch($locale)
                                    @case('es')
                                    <li class="especialLineMid"><a href="{{ route('idioma',['locale'=>'en']) }}"> En </a></li>
                                    @break
                                    @case('en')
                                    <li class="especialLineMid"><a href="{{ route('idioma',['locale'=>'es']) }}"> Es </a></li>
                                    @break
                                    @default
                                    <li class="especialLineMid"><a href="{{ route('idioma',['locale'=>'en']) }}"> En </a></li>
                                @endswitch
                </ul>               
            </div>
            <!-- Right Side Of Navbar -->
        
        </nav>
        <div class="father-log-p father-log-p-rw">
            <div class="nav-rw">
                <a href="#"><span class="fas fa-bars tam hambur-rw"></span></a>
            </div>
            <div class="log container">
                <a href="{{$parametros->link_cede}}"><img class="logo-andes log-rw" src="{{ asset('img/logo-andes-centrodatos-cede.svg') }}" alt="logo" title="Universidad de los Andes"></a>
            </div>
        </div>
        <nav>
            <div class="container">
                <ul>
                    @if(sizeof($menus) > 0)
                        @foreach ($menus as $menu)
                        <li class="menu-especial-h"><a href="{{ $menu->link }}" target="{{ $menu->target }}">@if($locale=="en"){{ $menu->name_en }}@else {{ $menu->name }}@endif</a></li>
                        @endforeach                    
                    @else

                    @endif
                </ul>
            </div>
        </nav>

        <nav class="top-responsive">
            <div class="container nav-top">
                <a class="volver" href="{{$parametros->link_uniandes}}">{{ __('link-uniandes') }}</a>
                <ul class="ul-nav-top">
                    @auth
                    <li><span class="text-light">Hola  {{ Auth::user()->name }} </span></li>
                    
                    <li><a class="text-light " href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">{{ __('Logout') }}</a></li>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                        {{ csrf_field() }}
                    </form>
                @else
                    <li><a class="text-light " href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    
                    @if (Route::has('register'))
                        <li><a class="text-light " href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        
                    @endif
                @endauth  
                    @if(sizeof($top_menu) > 0)
                        @foreach ($top_menu as $menu_top)
                        <li class="especialLineMid"><a href="{{ $menu_top->link }}"  target="{{ $menu_top->target }}">@if($locale=="en"){{ $menu_top->name_en }}@else {{ $menu_top->name }}@endif</a></li>
                        @endforeach                    
                    @endif
                    @switch($locale)
                                    @case('es')
                                    <li><a href="lang/en"> En </a></li>
                                    @break
                                    @case('en')
                                    <li><a href="lang/es"> Es </a></li>
                                    @break
                                    @default
                                    <li><a href="lang/en"> En </a></li>
                                @endswitch
                </ul>
                
            </div>
            <!-- Right Side Of Navbar -->
        
        </nav>
    </div>
    <div class="pad-navs-g"></div>
</header>
