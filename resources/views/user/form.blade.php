<div class="box box-info padding-2">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('user_name', $user->user_name, ['class' => 'form-control' . ($errors->has('user_name') ? ' is-invalid' : ''), 'placeholder' => 'User Name']) }}
            {!! $errors->first('user_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Apellido') }}
            {{ Form::text('user_surname', $user->user_surname, ['class' => 'form-control' . ($errors->has('user_surname') ? ' is-invalid' : ''), 'placeholder' => 'Apellido']) }}
            {!! $errors->first('user_surname', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Cédula de identidad') }}
            {{ Form::text('user_ci', $user->user_ci, ['class' => 'form-control' . ($errors->has('user_ci') ? ' is-invalid' : ''), 'placeholder' => 'User Ci']) }}
            {!! $errors->first('user_ci', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Correo') }}
            {{ Form::text('user_email', $user->user_email, ['class' => 'form-control' . ($errors->has('user_email') ? ' is-invalid' : ''), 'placeholder' => 'User Email']) }}
            {!! $errors->first('user_email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Teléfono') }}
            {{ Form::text('user_number', $user->user_number, ['class' => 'form-control' . ($errors->has('user_number') ? ' is-invalid' : ''), 'placeholder' => 'Teléfono']) }}
            {!! $errors->first('user_number', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Contraseña') }}
            {{ Form::text('password', "", ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => '************']) }}
            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha de nacimiento') }}
            {{ Form::text('user_date_of_birth', $user->user_date_of_birth, ['class' => 'form-control' . ($errors->has('user_date_of_birth') ? ' is-invalid' : ''), 'placeholder' => 'User Date Of Birth']) }}
            {!! $errors->first('user_date_of_birth', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Genero') }}
            {{ Form::select('user_gender', ['Masculino' => 'Masculino', 'Femenino' => 'Femenino','Sin especificar' => 'Sin especificar'], $user->user_gender, ['class' => 'form-control' . ($errors->has('user_gender') ? ' is-invalid' : '')]) }}
            {!! $errors->first('user_gender', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary py-2 mt-2">Enviar</button>
    </div>
</div>