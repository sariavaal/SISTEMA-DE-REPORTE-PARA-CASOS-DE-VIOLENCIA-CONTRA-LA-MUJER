@extends('layouts.app')

@section('template_title')
    {{ $acussation->name ?? 'Show Acussation' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Acussation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('acussations.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Users Id:</strong>
                            {{ $acussation->users_id }}
                        </div>
                        <div class="form-group">
                            <strong>Police Id:</strong>
                            {{ $acussation->police_id }}
                        </div>
                        <div class="form-group">
                            <strong>Type Of Acusation:</strong>
                            {{ $acussation->type_of_acusation }}
                        </div>
                        <div class="form-group">
                            <strong>Standard Acussation:</strong>
                            {{ $acussation->standard_acussation }}
                        </div>
                        <div class="form-group">
                            <strong>Urgent Acussation:</strong>
                            {{ $acussation->urgent_acussation }}
                        </div>
                        <div class="form-group">
                            <strong>Lat Lon:</strong>
                            {{ $acussation->lat_lon }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
