@extends('layouts.app')

@section('template_title')
    {{ $urgente->name ?? 'Show urgente' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-5 float-start">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar denuncia urgente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('denuncia') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>id:</strong>
                            {{ $urgente->id }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $urgente->description }}
                        </div>
                        <div class="form-group">
                            <strong>Ubicación:</strong>
                            {{ $urgente->lat.','.$urgente->lon }}
                        </div>
                        <div class="form-group">
                            <strong>Cédula de identidad:</strong>
                            {{ $urgente->ci }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $urgente->status }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha y hora de la denuncia:</strong>
                            {{ $urgente->created_at }}
                        </div>

                        </div>
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
        const userCoords = {lat:{{$urgente->lat}}, lng: {{$urgente->lon}}};
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

          
</div>
    </section>
@endsection
