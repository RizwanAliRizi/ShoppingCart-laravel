@extends('layouts.master')
@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-4">
		<h1> Sign Up </h1>
		@if(count($errors)>0)
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<p>{{$error}}</p>
			@endforeach
		</div>
		@endif

		<form method="post" action="{{route('user.signup')}}"> 
			@csrf()
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control">
				
			</div>

			<div class="form-group">
				<label for="email">E-mail</label>
				<input type="email" name="email" class="form-control">
				
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control">
				
			</div>
			<button type="submit" class="btn btn-primary">Sign Up</button>
			

		</form>
		

	</div>
	
</div>



@endsection