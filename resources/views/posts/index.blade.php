@extends('layouts.master')


@section('content')


  <div class="col-sm-8 blog-main">

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
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