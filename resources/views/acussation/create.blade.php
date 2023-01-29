@extends('layouts.app')

@section('template_title')
    Create Acussation
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
                        <form method="POST" action="{{ route('acussations.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('acussation.form')

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
    document.addEventListener("DOMContentLoaded", function(event){  


        });
         </script>

         </div>
                </div>
            </div>
        </div>
    </section>
@endsection
