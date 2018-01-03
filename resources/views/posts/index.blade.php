@extends('layouts.master')


@section('content')


  <div class="col-sm-8 blog-main">

  	<!-- will be used to show any messages -->
	@if (Session::has('message'))

    	<div class="alert alert-info">{{ Session::get('message') }}

    	</div>
	@endif

	<!-- post start -->

    @foreach ($posts as $post)

      @include ('posts.post')

    @endforeach

    @include('layouts.errors')


  </div><!-- /.blog-main -->


    @section('sidebar')
    
    @endsection


@endsection


@section('footer')

	<script src="/js/file.js"></script>

@endsection