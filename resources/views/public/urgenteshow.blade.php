@extends('layouts.app')

@section('template_title')
    {{ $urgente->name ?? 'Show urgente' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
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

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
