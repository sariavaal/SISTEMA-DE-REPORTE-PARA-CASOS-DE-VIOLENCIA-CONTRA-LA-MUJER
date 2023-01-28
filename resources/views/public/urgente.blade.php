    @extends('layouts.app')
    @section('template_title')
    
    @endsection
    @section('content')
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-5 float-start">

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

                
                 <div class="col-md-5 float-end">
                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">Mapa</span>
                        </div>
                        <div class="card-body" >
                            <div id="mapDiv" > </div>
                        <button id="button" class="btn btn-primary mt-3"> Mostrar ubicación </button>


    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDA8dJes6KRdgiJfA5HMhfimfVOIos91R8&callback=initMap"></script>
    <script>
    function initMap() {
        const pyCoords = {lat:-23.442503, lng: -58.443832};
        const  map= new google.maps.Map(mapDiv, {
            center:pyCoords,
            zoom: 6,
        });
        const marker = new google.maps.Marker({
            position: pyCoords,
            map: map,
        });
        
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                ({coords: {latitude, longitude} }) => {
                    const coords = {
                        lat : latitude,
                        lng : longitude,
                    };
                    map.setCenter(coords);
                    map.setZoom(8);
                    marker.setPosition(coords);
                    document.getElementById('lat').setAttribute('value', latitude)
                    document.getElementById('lon').setAttribute('value', longitude)
                },
                () => {
                    alert("Ocurrio un error");
                }
            );
            
         }else{
            alert("Tu navegador no dispone de geolocalizacion");
         }
         }
    //denunciante 
//    var denunciaStatus = 'pending';
//    let checkPendingStatus = setInterval(() => {
//        $.ajax({
//        url: "https://fiddle.jshell.net/favicon.png" // crear ruta para preguntar el estado de una denuncia 
//        })
//        .done(function( data ) {
//            // checkear si la denuncia termino y cambiar el estado de denunciaStatus si no es pending
//            if (data.status == 'in process' && denunciaStatus == 'pending') {
//                denunciaStatus = data.status;
//                Swal.fire({
//                title: 'Denuncia en Progreso',
//                text: 'Su denuncia a sido atendida por un Oficial',
//                icon: 'success'
//                }).then((result) => {
//                    /* Read more about isConfirmed, isDenied below */
//                    if (result.isConfirmed) {
//                        
//                    } else if (result.isDenied) {
//                        Swal.fire('Changes are not saved', '', 'info')
//                    }
//                })
//            }
//        });            
//    }, 10000);
//
//    let checker = setInterval(() => {
//        if (denunciaStatus == 'in process') {
//            clearInterval(checkPendingStatus);
//        }
//    }, 8000);

    </script>

                        </div>
                    </div>
                </div>

            </div>
    

    </section>
    
    @endsection

