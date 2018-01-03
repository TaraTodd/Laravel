@extends('layouts.master')


@section('content')

<div class="col-sm-8 blog-main">

	<form method="post" action="/blogs">


		{{ csrf_field() }}<!--token generate - if match then request go through ok -->

  		<div class="form-group">

    		<label for="title">Title</label>

    		<input type="text" class="form-control" name="title" placeholder="Title">

  		</div>


  		<div class="form-group">

    		<label for="body">Body</label>

    		<textarea type="text" id="body" name="body" class="form-control">
    			
    		</textarea>
    		
  		</div>


  		<div class="form-group">
  			
  			<button type="submit" class="btn btn-primary">Submit</button>

  		</div>

  		@include('layouts.errors')

	</form>
  
</div>


@endsection