@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row content-center">
	<div class="col-md-8">
		<div class="table-responsive">
		<form action="{{ URL('task') }}{{ isset($tasks)? '/'. $tasks->id: ''}}" method="POST">
		<div class="form-group">
			{{csrf_field()}}
			@if (isset($tasks))
				{{ method_field('PUT')}}
			@endif
			<input type="text"	name="task_name" placeholder="New Task" class="form-control" value="{{ isset($tasks) ? $tasks->task_name : ''}}">
			<input type="hidden"	name="user_id" placeholder="New Task" class="form-control" value="{{Auth::id()}}">
			</div>
			<button type="submit" class="btn btn-md btn-default">Create</button>
		
		</form>
	</div>
	</div>
</div>
</div>

@endsection
