@include('wp-admin.menue')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Creation') }} Ue</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ues.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('ue.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('wp-admin.menuef')