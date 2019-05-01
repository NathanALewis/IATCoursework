@extends('layouts.admin')

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
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Requestee Name</th>
								<th>Animal Name</th>
								<th>Status</th>
								<th colspan="3">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($requests as $request)
								<tr>
									<td>{{$request['name']}}</td>
									<td>{{$request['animal_name']}}</td>
									<td>{{$request['status']}}</td>
									<td><a href="{{action('RequestController@approve', $request['id'])}}" class="btn
									btn- primary">Approve</a></td>
									<td><a href="{{action('RequestController@deny', $request['id'])}}" class="btn
									btn- primary">Deny</a></td>
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
