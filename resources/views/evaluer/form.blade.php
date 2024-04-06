<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Etudiant') }}
            <select class="form-select{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" id="user_id" aria-label="Default select example">
                <option selected disabled>--Faites votre choix--</option>
                @foreach ($users as $User)
                    <option value="{{ $User->id }}" {{ $User->id == $evaluer->user_id ? 'selected' : '' }}>{{ $User->firstname }} {{ $User->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Ec') }}
            <select class="form-select{{ $errors->has('ec_id') ? ' is-invalid' : '' }}" name="ec_id" id="ec_id" aria-label="Default select example">
                <option selected disabled>--Faites votre choix--</option>
                @foreach ($ecs as $Ec)
                    <option value="{{ $Ec->id }}" {{ $Ec->id == $evaluer->ec_id ? 'selected' : '' }}>{{ $Ec->libelle }}</option>
                @endforeach
            </select>
            {!! $errors->first('ec_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Points Forts') }}
            {{ Form::text('PointsForts', $evaluer->PointsForts, ['class' => 'form-control' . ($errors->has('PointsForts') ? ' is-invalid' : ''), 'placeholder' => 'Pointsforts']) }}
            {!! $errors->first('PointsForts', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Points Faible') }}
            {{ Form::text('PointsFaible', $evaluer->PointsFaible, ['class' => 'form-control' . ($errors->has('PointsFaible') ? ' is-invalid' : ''), 'placeholder' => 'Pointsfaible']) }}
            {!! $errors->first('PointsFaible', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('note') }}
            {{ Form::text('note', $evaluer->note, ['class' => 'form-control' . ($errors->has('note') ? ' is-invalid' : ''), 'placeholder' => 'Note']) }}
            {!! $errors->first('note', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('date') }}
            {{ Form::date('date', $evaluer->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>