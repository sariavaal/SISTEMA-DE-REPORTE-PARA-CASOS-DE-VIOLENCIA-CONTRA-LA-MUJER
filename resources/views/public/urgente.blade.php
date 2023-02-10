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
                            

                        </div>
                    </div>
                </div>
            </div>
    
    <script>
        //document.addEventListener("DOMContentLoaded", function(event) {
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
//});
    </script>


</section>

@endsection

