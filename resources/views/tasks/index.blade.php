@extends('layouts.app')
@section('content')
<!DOCTYPE html>

<html>

<head>

	<title></title>

</head>

<body>

	<ul>


		@foreach ($tasks as $task) <!--collection of objects-->

			<li>

				<a href="/tasks/{{ $task->id}}">

					{{ $task->body }}
					
				</a>

			</li> <!--call body from tasks in db-->

		@endforeach

	</ul>

</body>

</html>