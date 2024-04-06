@include('wp-admin.menue')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Creation') }} Responsabilité</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('etreresponsables.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('etreresponsable.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('wp-admin.menuef')