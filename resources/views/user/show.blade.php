@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? 'Show User' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar usuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $user->user_name }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $user->user_surname }}
                        </div>
                        <div class="form-group">
                            <strong>Cédula:</strong>
                            {{ $user->user_ci }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $user->user_email }}
                        </div>
                        <div class="form-group">
                            <strong>Contraseña:</strong>
                            {{ $user->user_password }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de nacimiento:</strong>
                            {{ $user->user_date_of_birth }}
                        </div>
                        <div class="form-group">
                            <strong>Género:</strong>
                            {{ $user->user_gender }} 
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
