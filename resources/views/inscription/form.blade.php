<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Etudiant') }}
            <select class="form-select{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" id="user_id" aria-label="Default select example">
                <option selected disabled>--Faites votre choix--</option>
                @foreach ($users as $User)
                    <option value="{{ $User->id }}" {{ $User->id == $inscription->user_id ? 'selected' : '' }}>{{ $User->firstname }}  {{ $User->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Classe(s)') }}
            <select class="form-select{{ $errors->has('niveauclasse_id') ? ' is-invalid' : '' }}" name="niveauclasse_id" id="niveauclasse_id" aria-label="Default select example">
                <option selected disabled>--Faites votre choix--</option>
                @foreach ($niveauclasses as $Niveauclasse)
                    <option value="{{ $Niveauclasse->id }}" {{ $Niveauclasse->id == $inscription->niveauclasse_id ? 'selected' : '' }}>{{ $Niveauclasse->libelle }}</option>
                @endforeach
            </select>
            {!! $errors->first('niveauclasse_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('annee') }}
            {{ Form::text('annee', $inscription->annee, ['class' => 'form-control' . ($errors->has('annee') ? ' is-invalid' : ''), 'placeholder' => 'Annee']) }}
            {!! $errors->first('annee', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>