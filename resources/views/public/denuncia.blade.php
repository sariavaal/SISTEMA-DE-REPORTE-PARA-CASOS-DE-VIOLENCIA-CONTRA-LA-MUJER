@extends('layouts.app')

@section('template_title')
    
@endsection

@section('content')
    <div class="py-3  px-4 border-top border-bottom row">
        <form action="{{ route('denuncia') }}" method="GET">
            <div class="col-2 float-start">
                Filtrar Busqueda :
            </div>          
            <?php $status = isset($_GET['status']) ? $_GET['status'] : '' ;?>
            <div class="col-3 float-start">
                <select class="form-select" name="status" aria-label="Default select example">
                    <option>Seleccione estado</option>
                    <option <?= $status == 'pending' ? 'selected="selected"' : '' ;?> value="pending">Pendiente</option>
                    <option <?= $status == 'in process' ? 'selected="selected"' : '' ;?> value="in process">En Progreso</option>
                    <option <?= $status == 'finished' ? 'selected="selected"' : '' ;?> value="finished">Finalizado</option>
                </select>
            </div>    
            <button type="submit" class="btn btn-primary col-2 float-end">Buscar</button>  
        </form>
    </div>
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
                                            <?php $estados = ['pending' => 'Pendiente', 'in process' => 'En Progreso', 'finished' => 'Finalizado']?>
                                            <td>{{ isset($estados[$denuncia->status]) ? $estados[$denuncia->status] : '' ; }}</td>
											<td>{{ $denuncia->lat.','.$denuncia->lon }}</td> 
                                            <td>
                                               
                                            <form action="{{ route('urgente.destroy', $denuncia->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('urgenteshow', $denuncia->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('urgente.edit', $denuncia->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
