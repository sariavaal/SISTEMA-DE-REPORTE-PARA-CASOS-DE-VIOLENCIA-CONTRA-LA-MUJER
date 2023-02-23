@extends('layouts.app')

@section('template_title')
    Acussation
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
            <div class="py-3  px-4 border-top border-bottom row">
                <form action="{{ route('acussations.index') }}" method="GET">
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
            <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Denuncias') }}
                            </span>  
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
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($acussations as $acussation)
                                        <tr>
                                           
                                        @can('administrar_denuncias')
											<td>{{ $acussation->users_id }}</td> 
                                            @endcan
                                            <?php $estados = ['pending' => 'Pendiente', 'in process' => 'En Progreso', 'finished' => 'Finalizado']?>
                                            <td>{{ isset($estados[$acussation->status]) ? $estados[$acussation->status] : '' ; }}</td>
											<td>{{ $acussation->type_of_acusation == 'standard' ? 'Estandar' : 'Urgente' }}</td>
											<td>{{ $acussation->lat.','.$acussation->lon }}</td> 
                                            <td>{{ $acussation->description }}</td>
                                            

                                            <td>
                                                <form action="{{ route('acussations.destroy',$acussation->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('acussations.show', $acussation->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('acussations.edit',$acussation->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $acussations->links() !!}
            </div>
        </div>
    </div>
@endsection

