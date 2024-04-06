<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('libelle') }}
            {{ Form::text('libelle', $niveauclass->libelle, ['class' => 'form-control' . ($errors->has('libelle') ? ' is-invalid' : ''), 'placeholder' => 'Libelle']) }}
            {!! $errors->first('libelle', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('formation(s)') }}
            <select class="form-select{{ $errors->has('formation_id') ? ' is-invalid' : '' }}" name="formation_id" id="formation_id" aria-label="Default select example">
                <option selected disabled>--Faites votre choix--</option>
                @foreach ($formations as $formation)
                    <option value="{{ $formation['id'] }}" {{ $formation['id'] == $niveauclass->formation_id ? 'selected' : '' }}>{{ $formation['libelle'] }}</option>
                @endforeach
            </select>
            {!! $errors->first('formation_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>





    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

