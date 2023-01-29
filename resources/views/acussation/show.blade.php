@extends('layouts.app')

@section('template_title')
    {{ $acussation->name ?? 'Show Acussation' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-5 float-start">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Denuncia estándar</span>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id de usuario:</strong>
                            {{ $acussation->users_id }}
                        </div>
                      
                        <div class="form-group">
                            <strong>Tipo de acusación:</strong>
                            {{ $acussation->type_of_acusation }}
                        </div>
                     
                        <div class="form-group">
                            <strong>Ubicación:</strong>
                            {{ $acussation->lat.','.$acussation->lon }}
                        </div>

                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $acussation->description}}
                        </div>
                      
                        <div class="form-group">
                            <strong>Fecha y hora de la denuncia:</strong>
                            {{ $acussation->created_at}}
                        </div>

                    </div>
                </div>
                <div class="float-right mt-1">
                            <a class="btn btn-primary" href="{{ route('acussations.index') }}"> Volver</a>
                        </div>


            </div>
        


        <div class="col-md-5 float-end">
                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">Mapa</span>
                        </div>
                    </div>
                        <div class="card-body" >
                            <div id="mapDiv" ></div>
                        </div>
        </div>

        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDA8dJes6KRdgiJfA5HMhfimfVOIos91R8&callback=initMap"></script>
<script>
function initMap() {
        const userCoords = {lat:{{$acussation->lat}}, lng: {{$acussation->lon}}};
        const  map= new google.maps.Map(mapDiv, {
            center:userCoords,
            zoom: 6,
        });
        const marker = new google.maps.Marker({
            position: userCoords,
            map: map,
        });
        map.setCenter(userCoords);
        map.setZoom(8);
        marker.setPosition(userCoords);
       
         }
</script>



    </section>
@endsection
