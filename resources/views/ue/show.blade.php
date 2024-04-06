@include('wp-admin.menue')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Ue</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ues.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Libelle:</strong>
                            {{ $ue->libelle }}
                        </div>
                        <div class="form-group">
                            <strong>Niveauclasse Id:</strong>
                            {{ $ue->niveauclasse_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@include('wp-admin.menuef')