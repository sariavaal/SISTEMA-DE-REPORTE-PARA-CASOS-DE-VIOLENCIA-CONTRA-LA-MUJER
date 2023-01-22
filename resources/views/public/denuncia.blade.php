@extends('layouts.app')

@section('template_title')
    
@endsection

@section('content')
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
										<th>Id Usuario</th>
										<th>Descripción</th>
										<th>Cédula de identidad nro</th>
										<th>Ubicación</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($denuncias as $denuncia)
                                        <tr>
											<td>{{ $denuncia->id }}</td> 
                                            <td>{{ $denuncia->description }}</td>
											<td>{{ $denuncia->ci }}</td>
											<td>{{ $denuncia->lat.','.$denuncia->lon }}</td> 
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $denuncias->links() !!}
            </div>
        </div>
    </div>
@endsection
