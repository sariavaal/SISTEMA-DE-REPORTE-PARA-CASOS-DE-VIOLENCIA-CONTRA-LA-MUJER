



<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
        
           
            {{ Form::hidden('users_id',auth()->user()->id, ['class' => 'form-control' . ($errors->has('users_id') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('users_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <div class="form-group">
            {{ Form::label('id') }}
            {{ Form::select('police_id',$user, $acussation->police_id, ['class' => 'form-control' . ($errors->has('police_id') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('police_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tipo de Denuncia') }}
        </div>
        <div class="form-group">
            {{ Form::label('Denuncia estándar') }}
            {{ Form::checkbox('standard_acussation', $acussation->standard_acussation, ['class' => 'form-control' . ($errors->has('standard_acussation') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('standard_acussation', '<div class="invalid-feedback">:message</div>') !!}
            {{ Form::label('Denuncia urgente') }}
            {{ Form::checkbox('urgent_acussation', $acussation->urgent_acussation, ['class' => 'form-control' . ($errors->has('urgent_acussation') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('urgent_acussation', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Descripción') }}
            {{ Form::text('description', $acussation->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Ubicación') }}
            {{ Form::text('lat_lon', $acussation->lat_lon, ['class' => 'form-control' . ($errors->has('lat_lon') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('lat_lon', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary mt-2">Enviar</button>
    </div>
</div>
