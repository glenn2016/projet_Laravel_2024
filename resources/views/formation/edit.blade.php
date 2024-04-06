@include('wp-admin.menue')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Formation</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('formations.update', $formation->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('formation.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('wp-admin.menuef')