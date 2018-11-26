@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<!-- <div class="card-header" align="center"><h3>New Task</h3>
                </div> -->
			 @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li><span>{{ $error }}<span></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
       <div class="card-body">
          <div class="col-md-12">
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
			<center><button type="submit" class="btn btn-md btn-success">Save</button>
				<a href="{{ URL('task') }}" class="btn btn-primary">Cancel</a></center>
		</form>
	</div>
</div>
	</div>
</div>
	</div>
</div>
</div>

@endsection
