@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="form-group mb-3">
    {{ Form::label('Descripción') }}
    {{ Form::textarea('description', $urgente->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion de la denuncia', 'rows' => 5]) }}
    {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::label('Cédula de identidad') }}
    {{ Form::text('ci', $urgente->ci, ['class' => 'form-control' . ($errors->has('ci') ? ' is-invalid' : ''), 'placeholder' => '']) }}
    {!! $errors->first('ci', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::label('Latitud') }}
    {{ Form::text('lat', $urgente->lat, ['class' => 'form-control input_latitud' . ($errors->has('lat') ? ' is-invalid' : ''), 'placeholder' => '', 'id' => 'lat', 'readonly']) }}
    {!! $errors->first('lat', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    {{ Form::label('Longitud') }}
    {{ Form::text('lon', $urgente->lon, ['class' => 'form-control input_longitud' . ($errors->has('lon') ? ' is-invalid' : ''), 'placeholder' => '', 'id' => 'lon','readonly']) }}
    {!! $errors->first('lon', '<div class="invalid-feedback">:message</div>') !!}
</div>


<div class="d-grid gap-2 col-6 mx-auto">
    <button type="submit" class="btn btn-primary mb-4 mt-3">Enviar</button>
</div>

