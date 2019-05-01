@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Animal Name</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach($requests as $request)
								<tr>
									<td>{{$request['animal_name']}}</td>
									<td>{{$request['status']}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
