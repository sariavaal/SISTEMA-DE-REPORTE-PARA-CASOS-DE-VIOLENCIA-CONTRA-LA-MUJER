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
                            <span class="card-title">Show User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Name:</strong>
                            {{ $user->user_name }}
                        </div>
                        <div class="form-group">
                            <strong>User Ci:</strong>
                            {{ $user->user_ci }}
                        </div>
                        <div class="form-group">
                            <strong>User Email:</strong>
                            {{ $user->user_email }}
                        </div>
                        <div class="form-group">
                            <strong>User Password:</strong>
                            {{ $user->user_password }}
                        </div>
                        <div class="form-group">
                            <strong>User Date Of Birth:</strong>
                            {{ $user->user_date_of_birth }}
                        </div>
                        <div class="form-group">
                            <strong>User Gender:</strong>
                            {{ $user->user_gender }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
