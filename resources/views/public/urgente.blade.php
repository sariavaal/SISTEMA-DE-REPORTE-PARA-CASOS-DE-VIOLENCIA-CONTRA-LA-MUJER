@extends('layouts.app')
@section('template_title')
   
@endsection
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Denuncia</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('envio') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('public.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>

//Pedir activación de ubicación
if (navigator.geolocation) navigator.geolocation.getCurrentPosition(function(pos) {
    
    //Si es aceptada guardamos lo latitud y longitud
   
setInterval(() => {

     var lat = pos.coords.latitude;
    var lon = pos.coords.longitude;
    
}, 5000);
}, function(error) {

    //Si es rechazada enviamos de error por consola
    console.log('Ubicación no activada');
});


</script>
@endsection