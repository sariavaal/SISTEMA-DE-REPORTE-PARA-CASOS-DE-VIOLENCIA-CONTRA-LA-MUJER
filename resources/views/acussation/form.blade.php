
<div class="box box-info padding-1">
    <div class="box-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="form-group">
            {{ Form::hidden('users_id',auth()->user()->id, ['class' => 'form-control' . ($errors->has('users_id') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('users_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::hidden('type_of_acusation', 'standard', ['class' => 'form-control' . ($errors->has('standard_acussation') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('type_of_acusation', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Descripción') }}
            {{ Form::textarea('description', $acussation->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Latitud') }}
            {{ Form::text('lat', $acussation->lat, ['class' => 'form-control input_latitud' . ($errors->has('lat') ? ' is-invalid' : ''), 'placeholder' => '','id' => 'lat', 'readonly',]) }}
            {!! $errors->first('lat', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Longitud') }}
            {{ Form::text('lon', $acussation->lon, ['class' => 'form-control input_longitud' . ($errors->has('lon') ? ' is-invalid' : ''), 'placeholder' => '','id' => 'lon','readonly']) }}
            {!! $errors->first('lon', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        @can('administrar_usuarios')
        <div class="form-group">
            {{ Form::label('Status') }}
            {{ Form::select('status',['pending' => 'Pendiente','in process' => 'En proceso','finished'=> 'Finalizado'], $acussation->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => '','id' => 'status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @endcan



    </div>
    <div class="container">
  <div class="row">
    <div class="col-sm">
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-success">Enviar</button>
         <a class="btn btn-primary" href="{{ route('acussations.store') }}"> Volver</a>
        </div>
  </div>
 
</div>
</div>