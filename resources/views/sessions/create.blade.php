@extends ('layouts.simple')


@section('content')

	<div class="col-sm-8">

		<h1>Login</h1>

		<form method="post" action="/login">


			{{ csrf_field() }}


			<div class="form-group">

				<label for="email">Email Address:</label>

				<input type="email" class="form-control" id="email" name="email" required>

			</div>

			<div class="form-group">

				<label for="password">Password:</label>

				<input type="password" class="form-control" id="password" name="password" required>

			</div>


			<div class="form-group">

				<button type="submit" class="btn btn-primary">sign in</button>

				<a class="btn btn-small btn-success" href="{{ URL::to('register') }}">Register</a>

				@include('layouts.errors')

			</div>

		</form>

	</div>

@endsection