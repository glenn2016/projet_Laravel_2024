@include('wp-admin.menue')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Enseigner</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('enseigners.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Ec Id:</strong>
                            {{ $enseigner->ec_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $enseigner->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Annee:</strong>
                            {{ $enseigner->annee }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@include('wp-admin.menuef')
