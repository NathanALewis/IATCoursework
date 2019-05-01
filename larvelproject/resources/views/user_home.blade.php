@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
					@if (isset($adopted))
						<div class="alert alert-success" role="alert">
                            Successful Request Submitted
                        </div>
					@endif
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
								<th>Date of Birth</th>
								<th>Description</th>
								<th colspan='3'>Image</th>
								<th>Apply to Adopt</th>
							</tr>
						</thead>
						<tbody>
							@foreach($animals as $animal)
								<tr>
									<td>{{$animal['animal_name']}}</td>
									<td>{{$animal['date_of_birth']}}</td>
									<td>{{$animal['description']}}</td>
									<td colspan='3'><img  src="{{ asset('storage/images/'.$animal->image)}}"></td>
									
									<td><a href="{{action('RequestController@build', $animal['id'])}}" class="btn
									btn- primary">Request to Adopt</a></td>
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
