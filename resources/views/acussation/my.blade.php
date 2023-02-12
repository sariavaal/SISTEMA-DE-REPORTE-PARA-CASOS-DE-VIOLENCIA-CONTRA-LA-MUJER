@extends('layouts.app')

@section('template_title')
    Acussation
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Denuncias') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('home') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Realizar denuncia') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>

                                         @can('administrar_denuncias')
										<th>Id Usuario</th>
                                        @endcan
										<th>Estado</th>
										<th>Tipo de acusación</th>
										<th>Ubicación</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($acussations as $acussation)
                                        <tr>
                                        @can('administrar_denuncias')
											<td>{{ $acussation->users_id }}</td> 
                                            @endcan
                                            <td>{{ $acussation->status }}</td>
											<td>{{ $acussation->type_of_acusation }}</td>
											<td>{{ $acussation->lat.','.$acussation->lon }}</td>
                                            <td>{{ $acussation->description }}</td> 
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $acussations->links() !!}
            </div>
        </div>
    </div>
@endsection
