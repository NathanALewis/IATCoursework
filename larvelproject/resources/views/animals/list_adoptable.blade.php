@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
									
									<td><a href="{{action('RequestController@build', $animal['ownerid'])}}" class="btn
									btn- primary">Request to Adopt</a></td>
									@endif
								</tr>
							@endforeach
						</tbody>
					</table>					
        </div>
    </div>
</div>
@endsection
