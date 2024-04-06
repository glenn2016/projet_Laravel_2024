<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Ec') }}
            <select class="form-select{{ $errors->has('ec_id') ? ' is-invalid' : '' }}" name="ec_id" id="ec_id" aria-label="Default select example">
                <option selected disabled>--Faites votre choix--</option>
                @foreach ($ecs as $Ec)
                    <option value="{{ $Ec->id }}" {{ $Ec->id == $enseigner->ec_id ? 'selected' : '' }}>{{ $Ec->libelle }}</option>
                @endforeach
            </select>
            {!! $errors->first('ec_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Enseignant') }}
            <select class="form-select{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" id="user_id" aria-label="Default select example">
                <option selected disabled>--Faites votre choix--</option>
                @foreach ($users as $User)
                    <option value="{{ $User->id }}" {{ $User->id == $enseigner->user_id ? 'selected' : '' }}>{{ $User->firstname }} {{ $User-> name }}</option>
                @endforeach
            </select>
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <div class="form-group">
            {{ Form::label('annee') }}
            {{ Form::text('annee', $enseigner->annee, ['class' => 'form-control' . ($errors->has('annee') ? ' is-invalid' : ''), 'placeholder' => 'Annee']) }}
            {!! $errors->first('annee', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>