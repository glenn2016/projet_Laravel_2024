@include('wp-admin.menue')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Evaluer') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('evaluers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-dark table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Etudiant</th>
										<th>Ec</th>
										<th>Pointsforts</th>
										<th>Pointsfaible</th>
										<th>Note</th>
										<th>Date</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($evaluers as $evaluer)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $evaluer->user_id }}</td>
											<td>{{ $evaluer->ec_id }}</td>
											<td>{{ $evaluer->PointsForts }}</td>
											<td>{{ $evaluer->PointsFaible }}</td>
											<td>{{ $evaluer->note }}</td>
											<td>{{ $evaluer->date }}</td>

                                            <td>
                                                <form action="{{ route('evaluers.destroy',$evaluer->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('evaluers.edit',$evaluer->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $evaluers->links() !!}
            </div>
        </div>
    </div>
@include('wp-admin.menuef')

