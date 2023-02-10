<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/jquery.min.js' ])

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar --> 
                    @if (Auth::check())
                    
                    <ul class="navbar-nav me-auto">
                    @can('administrar_usuarios')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">{{ __('Usuarios') }}</a>
                        </li> 
                        @endcan
                        @can('administrar_denuncias')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('acussations.index') }}">{{ __('Denuncias') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('denuncia') }}">{{ __('Urgentes') }}</a>
                        </li>
                        @endcan
                        @can('Ver_denuncias_propias')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('acussations.my') }}">{{ __('Mis Denuncias') }}</a>
                        </li>
                        @endcan
                    </ul>
                    @endif
                    
                  
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->user_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>   
                </div>
            </div>
        </nav>

        <main class="py-4">

            @yield('content') 
           
        </main>
    </div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", function(event) {
    @can('administrar_usuarios')
    setInterval(() => {
        $.ajax({
            url: "{{ route('check.urgent') }}" //url para preguntar si hay denuncias urgentes - ruta nueva
            })
            .done(function( data ) {
                // preguntar si existe o no 
                let id_urgente = data.id;
                if (Object.keys(data).length !== 0) {
                                    
                    Swal.fire({
                        title: 'Nueva denuncia urgente',
                        text: 'Alguien necesita ayuda',
                        icon: 'warning'
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            let ruta = '/urgentemostrar/'+id_urgente+'/inprogress'
                            console.log(id_urgente)
                            location.href = ruta
                        } else if (result.isDenied) {
                            Swal.fire('Changes are not saved', '', 'info')
                        }
                    })
                }


            });
    }, 5000);
    @endcan

    //denunciante 
    @can('Ver_denuncias_propias')
    var denunciaStatus = 'pending';
    
        jQuery('#alertaenv').on('click', function() {
            let checkPendingStatus = setInterval(() => {
                $.ajax({
                url: "https://fiddle.jshell.net/favicon.png" // crear ruta para preguntar el estado de una denuncia 
                })
                .done(function( data ) {
                    // checkear si la denuncia termino y cambiar el estado de denunciaStatus si no es pending
                    if (data.status == 'in process' && denunciaStatus == 'pending') {
                        denunciaStatus = data.status;
                        Swal.fire({
                        title: 'Denuncia en Progreso',
                        text: 'Su denuncia a sido atendida por un Oficial',
                        icon: 'success'
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                
                            } else if (result.isDenied) {
                                Swal.fire('Changes are not saved', '', 'info')
                            }
                        })
                    }
                });            
            }, 10000);

            let checker = setInterval(() => {
                if (denunciaStatus == 'in process') {
                    clearInterval(checkPendingStatus);
                }
            }, 8000);

        })
    @endcan

});
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDA8dJes6KRdgiJfA5HMhfimfVOIos91R8&callback=initMap"></script>

</body>
</html>


