<!-- inherite master template app.blade.php -->
@extends('layouts.admin')
<!-- define the content section -->
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10 ">
			<div class="card">
				<div class="card-header">Add a new animal for adoption</div>
				<!-- display the errors -->
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul> @foreach ($errors->all() as $error)
							<li>{{ $error }}</li> @endforeach
						</ul>
						</div><br /> @endif
				<!-- display the success status -->
					@if (\Session::has('success'))
					<div class="alert alert-success">
					<p>{{ \Session::get('success') }}</p>
					</div><br /> @endif
				 <!-- define the form -->
					<div class="card-body">
					<form class="form-horizontal" method="POST"
					action="{{url('animals') }}" enctype="multipart/form-data">
						@csrf
					<div class="col-md-8">
					 <!-- todo add proper forms -->
					
				 <label >Animal Name </label>
				<input type="text" name="name" />
				 </div>
				 <div class="col-md-8">
				<label>Date of Birth</label>
				<input type="text" name="date_of_birth" pattern="[0-9]{4}/[0-9]{2}/[0-9]{2}" placeholder="YYYY/MM/DD"  />
				</div>
				<div class="col-md-8">
				<label >Description</label>
				<textarea rows="4" cols="50" name="description">  </textarea>
				</div>
				<div class="col-md-8">
				<label>Image</label>
				<input type="file" name="image"
				placeholder="Image file" />
				</div>
				<div class="col-md-6 col-md-offset-4">
				<input type="submit" class="btn btn-primary" />
				<input type="reset" class="btn btn-primary" />
				</div>
			</form>
			</div>
			</div>
		</div>
	</div>
</div>
@endsection