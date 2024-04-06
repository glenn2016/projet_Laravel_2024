@include('wp-admin.menue')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Evaluer</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('evaluers.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $evaluer->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Ec Id:</strong>
                            {{ $evaluer->ec_id }}
                        </div>
                        <div class="form-group">
                            <strong>Pointsforts:</strong>
                            {{ $evaluer->PointsForts }}
                        </div>
                        <div class="form-group">
                            <strong>Pointsfaible:</strong>
                            {{ $evaluer->PointsFaible }}
                        </div>
                        <div class="form-group">
                            <strong>Note:</strong>
                            {{ $evaluer->note }}
                        </div>
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $evaluer->date }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@include('wp-admin.menuef')

