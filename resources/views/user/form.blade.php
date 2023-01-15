<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('user_name') }}
            {{ Form::text('user_name', $user->user_name, ['class' => 'form-control' . ($errors->has('user_name') ? ' is-invalid' : ''), 'placeholder' => 'User Name']) }}
            {!! $errors->first('user_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_ci') }}
            {{ Form::text('user_ci', $user->user_ci, ['class' => 'form-control' . ($errors->has('user_ci') ? ' is-invalid' : ''), 'placeholder' => 'User Ci']) }}
            {!! $errors->first('user_ci', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_email') }}
            {{ Form::text('user_email', $user->user_email, ['class' => 'form-control' . ($errors->has('user_email') ? ' is-invalid' : ''), 'placeholder' => 'User Email']) }}
            {!! $errors->first('user_email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('password') }}
            {{ Form::text('password', $user->password, ['class' => 'form-control' . ($errors->has('user_password') ? ' is-invalid' : ''), 'placeholder' => 'User Password']) }}
            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_date_of_birth') }}
            {{ Form::text('user_date_of_birth', $user->user_date_of_birth, ['class' => 'form-control' . ($errors->has('user_date_of_birth') ? ' is-invalid' : ''), 'placeholder' => 'User Date Of Birth']) }}
            {!! $errors->first('user_date_of_birth', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_gender') }}
            {{ Form::text('user_gender', $user->user_gender, ['class' => 'form-control' . ($errors->has('user_gender') ? ' is-invalid' : ''), 'placeholder' => 'User Gender']) }}
            {!! $errors->first('user_gender', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>