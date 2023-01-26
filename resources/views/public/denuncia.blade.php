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
                                        <th>Status</th>
										<th>Ubicación</th>
										<th></th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($denuncias as $denuncia)
                                        <tr>
											<td>{{ $denuncia->id }}</td> 
                                            <td>{{ $denuncia->description }}</td>
											<td>{{ $denuncia->ci }}</td>
                                            <th>{{$denuncia->status}}</th>
											<td>{{ $denuncia->lat.','.$denuncia->lon }}</td> 
                                            <td>
                                                <a class="btn btn-sm btn-primary " href="{{ route('urgenteshow', $denuncia->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                            </td>
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
