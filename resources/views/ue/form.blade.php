<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('libelle') }}
            {{ Form::text('libelle', $ue->libelle, ['class' => 'form-control' . ($errors->has('libelle') ? ' is-invalid' : ''), 'placeholder' => 'Libelle']) }}
            {!! $errors->first('libelle', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Classe(s)') }}
            <select class="form-select{{ $errors->has('niveauclasse_id') ? ' is-invalid' : '' }}" name="niveauclasse_id" id="niveauclasse_id" aria-label="Default select example">
                <option selected disabled>--Faites votre choix--</option>
                @foreach ($niveauclasses as $Niveauclasse)
                    <option value="{{ $Niveauclasse->id }}" {{ $Niveauclasse->id == $ue->niveauclasse_id ? 'selected' : '' }}>{{ $Niveauclasse->libelle }}</option>
                @endforeach
            </select>
            {!! $errors->first('niveauclasse_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>