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
                                        
                                        
										<th>Id Usuario</th>
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
                                           
                                            
											<td>{{ $acussation->users_id }}</td> 
                                            <td>{{ $acussation->status }}</td>
											<td>{{ $acussation->type_of_acusation }}</td>
											<td>{{ $acussation->lat.','.$acussation->lon }}</td> 
                                            <td>{{ $acussation->description }}</td>
                                            

                                            <td>
                                                <form action="{{ route('acussations.destroy',$acussation->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('acussations.show', $acussation->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('acussations.edit',$acussation->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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

