@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header" align="center"><h3>New Task</h3>
                </div>
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

                        @if (session("success"))
                            <div class="alert alert-success">
                                {{ session("success") }}
                            </div>
                        @endif
       <div class="card-body">
          <div class="col-md-12">
		<form action="{{ route('admin.createTask', ['userId' => $user->id]) }}" method="POST">
			@csrf
				<div class="form-group row">
                        <label for="task_name" class="col-sm-4 col-form-label text-md-right">Task Name</label>

                         <div class="col-md-6">
                         <input id="task_name" type="text" class="form-control" name="task_name">
                                </div>
                            </div>
                             <div class="form-group row">
                             <label for="user_id" class="col-sm-4 col-form-label text-md-right">User ID</label>
                             <div class="col-md-6">
                              <input id="id" type="text" class="form-control" name="id" value="{{ $user->id }}" readonly>
                                </div>
                            </div>
			<center><button type="submit" class="btn btn-md btn-success">Save</button>
			<a href="{{ route("admin.indexuser") }}" class="btn btn-primary">Cancel</a></center>
		</form>	
	</div>
</div>
	</div>
</div>
	</div>
</div>


@endsection
