@include('wp-admin.menue')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Etreresponsable</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('etreresponsables.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Formation Id:</strong>
                            {{ $etreresponsable->formation_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $etreresponsable->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Annee:</strong>
                            {{ $etreresponsable->annee }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@include('wp-admin.menuef')