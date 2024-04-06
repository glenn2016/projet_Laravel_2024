<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('libelle') }}
            {{ Form::text('libelle', $ec->libelle, ['class' => 'form-control' . ($errors->has('libelle') ? ' is-invalid' : ''), 'placeholder' => 'Libelle']) }}
            {!! $errors->first('libelle', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ues') }}
            <select class="form-select{{ $errors->has('ues_id') ? ' is-invalid' : '' }}" name="ues_id" id="ues_id" aria-label="Default select example">
                <option selected disabled>--Faites votre choix--</option>
                @foreach ($ues as $ue)
                    <option value="{{ $ue->id }}" {{ $ue->id == $ec->ues_id ? 'selected' : '' }}>{{ $ue->libelle }}</option>
                @endforeach
            </select>
            {!! $errors->first('ues_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>