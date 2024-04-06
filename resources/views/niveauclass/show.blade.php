@include('wp-admin.menue')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Niveauclass</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('niveauclasses.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Libelle:</strong>
                            {{ $niveauclass->libelle }}
                        </div>
                        <div class="form-group">
                            <strong>Formation Id:</strong>
                            {{ $niveauclass->formation_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@include('wp-admin.menuef')
