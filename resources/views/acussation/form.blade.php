
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
            {{ Form::text('description', $acussation->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Latitud') }}
            {{ Form::text('lat', $acussation->lat, ['class' => 'form-control' . ($errors->has('lat') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('lat', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Longitud') }}
            {{ Form::text('lon', $acussation->lon, ['class' => 'form-control' . ($errors->has('lon') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('lon', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary mt-2">Enviar</button>
    </div>
</div>
