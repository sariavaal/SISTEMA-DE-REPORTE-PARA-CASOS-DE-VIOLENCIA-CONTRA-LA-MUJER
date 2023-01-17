<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
           
            {{ Form::hidden('users_id',auth()->user()->id, ['class' => 'form-control' . ($errors->has('users_id') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('users_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <div class="form-group">
            {{ Form::label('police_id') }}
            {{ Form::select('police_id',$user, $acussation->police_id, ['class' => 'form-control' . ($errors->has('police_id') ? ' is-invalid' : ''), 'placeholder' => 'Police Id']) }}
            {!! $errors->first('police_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('type_of_acusation') }}
            {{ Form::text('type_of_acusation', $acussation->type_of_acusation, ['class' => 'form-control' . ($errors->has('type_of_acusation') ? ' is-invalid' : ''), 'placeholder' => 'Type Of Acusation']) }}
            {!! $errors->first('type_of_acusation', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('standard_acussation') }}
            {{ Form::text('standard_acussation', $acussation->standard_acussation, ['class' => 'form-control' . ($errors->has('standard_acussation') ? ' is-invalid' : ''), 'placeholder' => 'Standard Acussation']) }}
            {!! $errors->first('standard_acussation', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('urgent_acussation') }}
            {{ Form::text('urgent_acussation', $acussation->urgent_acussation, ['class' => 'form-control' . ($errors->has('urgent_acussation') ? ' is-invalid' : ''), 'placeholder' => 'Urgent Acussation']) }}
            {!! $errors->first('urgent_acussation', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lat_lon') }}
            {{ Form::text('lat_lon', $acussation->lat_lon, ['class' => 'form-control' . ($errors->has('lat_lon') ? ' is-invalid' : ''), 'placeholder' => 'Lat Lon']) }}
            {!! $errors->first('lat_lon', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>