<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('libelle') }}
            {{ Form::text('libelle', $formation->libelle, ['class' => 'form-control' . ($errors->has('libelle') ? ' is-invalid' : ''), 'placeholder' => 'Libelle']) }}
            {!! $errors->first('libelle', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>