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
                                               
                                            <form action="{{ route('urgente.destroy', $denuncia->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('urgenteshow', $denuncia->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('urgente.edit', $denuncia->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                </form>

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
