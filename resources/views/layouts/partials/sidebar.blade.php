{{--Para mas iconos ingresar al link--}}
{{--https://fonts.google.com/icons--}}
{{--Fin iconos--}}

<div class="sidebar-panel">
    <div class="sidebar-compact-switch"><span></span>
        <div></div>
        <span></span>
    </div>
    <div class="brand"><img src="{{asset('assets/images/arctic-admin-circle.svg')}}" alt=""/><span class="app-logo-text ml-2 text-20">Contención Digital</span></div>
    <!-- Start:: user-->
    <div class="scroll-nav" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <div class="app-user text-center">
            <div class="app-user-photo"><img src="{{asset('assets/images/avatars/003-man-1.svg')}}" alt=""/></div>
            <div class="app-user-info"><span class="app-user-name">Nombre de usurio</span>
                {{--                <div class="app-user-control"><a class="control-item" href="#"><i class="material-icons"> settings</i></a><a class="control-item" href="#"><i class="material-icons"> email</i></a><a class="control-item" href="#"><i class="material-icons"> exit_to_app</i></a></div>--}}
            </div>
        </div>
        <!-- End:: user-->
        <!-- Start:: side-nav-->
        <div class="side-nav">
            <div class="main-menu">
                <nav class="sidebar-nav">
                    <ul class="metismenu show-on-load" id="ul-menu">
                        <li><a class="bullet" href="{{url('home')}}"><i class="material-icons nav-icon">home</i>Inicio</a></li>
                        @if (\Illuminate\Support\Facades\Auth::User()->nivel == '1')
                            <li><a class="has-arrow" href="#"><i class="material-icons nav-icon">computer</i>Administrador</a>
                                <ul class="mm-collapse">
                                    <li><a class="bullet-icon" href="{{url('registro_usuario')}}"><i class="material-icons nav-icon">person</i>Registro Usuario</a></li>
{{--                                    <li><a class="bullet-icon" href="#"><i class="material-icons nav-icon">person</i>Roles</a></li>--}}
                                    <li><a class="bullet-icon" href="{{url('listado_usuario')}}"><i class="material-icons nav-icon">list</i>Listado</a></li>
                                </ul>
                            </li>
                        @endif
                        <span class="main-menu-title">GESTIÓN DE ARCHIVO</span>
                        {{-- @if (\Illuminate\Support\Facades\Auth::User()->nivel == '2' || \Illuminate\Support\Facades\Auth::User()->nivel == '1') --}}
                            <li><a class="has-arrow" href="#"><i class="material-icons nav-icon">account_balance</i>Archivo</a>
                                <ul class="mm-collapse">
                                    <li><a class="bullet-icon" href="{{ url('clientes') }}"><i class="material-icons nav-icon">gavel</i>Clientes</a></li>
                                </ul>
                            </li>
                        {{-- @endif --}}
                        @if (\Illuminate\Support\Facades\Auth::User()->nivel == '3' || \Illuminate\Support\Facades\Auth::User()->nivel == '1')
                            <li><a class="has-arrow" href="#"><i class="material-icons nav-icon">bar_chart</i>Biblioteca</a>
                                <ul class="mm-collapse">
                                    <li><a class="bullet-icon" href="#"><i class="material-icons nav-icon">show_chart</i>Normativas</a></li>
                                </ul>
                            </li>
                            {{-- <li><a class="has-arrow" href="#"><i class="material-icons nav-icon">bar_chart</i>Tesoreria</a>
                                <ul class="mm-collapse">
                                    <li><a class="bullet-icon" href="#"><i class="material-icons nav-icon">payments</i>Depositantes</a></li>
                                    <li><a class="bullet-icon" href="#"><i class="material-icons nav-icon">book</i>Libretas</a></li>
                                    <li><a class="bullet-icon" href="#"><i class="material-icons nav-icon">menu_open</i>Componentes C-21</a></li>
                                </ul>
                            </li> --}}

                            {{-- <li><a class="has-arrow" href="#"><i class="material-icons nav-icon">payments</i>Contabilidad</a>
                                <ul class="mm-collapse">
                                    <li><a class="bullet-icon" href="#"><i class="material-icons nav-icon">credit_card</i>Tarjeta de inversion</a></li>
                                </ul>
                            </li>

                            <li><a class="has-arrow" href="#"><i class="material-icons nav-icon">summarize</i>Reportes</a>
                                <ul class="mm-collapse">
                                    <li><a class="bullet-icon" href="#"><i class="material-icons nav-icon">gavel</i>Contrato de Prestamo</a></li>
                                    <li><a class="bullet-icon" href="#"><i class="material-icons nav-icon">library_books</i>Proyecto</a></li>
                                    <li><a class="bullet-icon" href="#"><i class="material-icons nav-icon">waterfall_chart</i>Estado de Inversión</a></li>
                                </ul>
                            </li> --}}

                        @endif
                        <span class="main-menu-title">CONFIGURACION</span>
                        {{-- <li><a class="has-arrow" href="#"><i class="material-icons nav-icon">done_all</i>Selección de Clasificadores</a>
                            <ul class="mm-collapse">
                                <li><a href=""><i class="bullet-icon"></i>Institucional</a></li>
                                <li><a href=""><i class="bullet-icon"></i>Rubros</a></li>
                                <li><a href=""><i class="bullet-icon"></i>Objeto del Gasto</a></li>
                                <li><a href=""><i class="bullet-icon"></i>Finalidad y Función</a></li>
                                <li><a href=""><i class="bullet-icon"></i>Fuentes de Financiamiento</a></li>
                                <li><a href=""><i class="bullet-icon"></i>Organismos Financiadores</a></li>
                                <li><a href=""><i class="bullet-icon"></i>Sectores Economicos</a></li>
                                <li><a href=""><i class="bullet-icon"></i>Geografico</a></li>
                                <li><a href=""><i class="bullet-icon"></i>Dirección Administrativa</a></li>
                                <li><a href=""><i class="bullet-icon"></i>Programa Presupuestario</a></li>
                            </ul>
                        </li> --}}
                        <li><a class="has-arrow" href="#"><i class="material-icons nav-icon">settings</i>Parametrización de sistema</a>
                            <ul class="mm-collapse">
                                <li><a class="bullet-icon" href="#"><i class="material-icons nav-icon">check_box</i>Parametricas</a></li>
                            </ul>
                        </li>


                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
