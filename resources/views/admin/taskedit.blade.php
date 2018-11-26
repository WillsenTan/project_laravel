@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" align="center"><h3>Update Task Details</h3>
                </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li><span>{{ $error }}<span></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('admin.updatetask', ['taskId' => $task->id]) }}">
                            @csrf
                            <div class="form-group row">
                                <label for="task_name" class="col-sm-4 col-form-label text-md-right">Task Name</label>

                                <div class="col-md-6">
                                    <input id="task_name" type="text" class="form-control" name="task_name" value="{{ $task->task_name }}">
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="user_id" class="col-sm-4 col-form-label text-md-right">User ID</label>

                                <div class="col-md-6">
                                    <input id="user_id" type="text" class="form-control" name="user_id" value="{{ $task->user_id }}" readonly>
                                </div>
                            </div>
                            <center><button type="submit" class="btn btn-success">Save</button>
                            <a href="{{ route("admin.indextask") }}" class="btn btn-primary">Cancel</a></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection