    @extends('layouts.master')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
        <a class="nav-link" href="{{ route('admin.indexuser') }}">{{ __('Registered User') }}</a>
        <a class="nav-link" href="{{ route('admin.indextask') }}">{{ __('All User Task') }}</a>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center"><h3>User Task List</h3>
                </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">    
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Task Details</th>
                                    <th class="text-center">User ID</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            @if (session("success"))
                            <div class="alert alert-success">
                                {{ session("success") }}
                            </div>
                        @endif
                            <tbody>
                                @foreach ($tasks as $task)
                                <!-- ($tasks as $key => $task) -->
                                <tr>
                                    <td>{{ $task->task_name }} </td>
                                    <td>{{ $task->user_id }} </td>
                                    <td>
                                    <center>
                                        <a href="{{ route("admin.edittask", ["taskId" => $task->id]) }}">Edit | </a>
                                         <a href="{{ route("admin.deletetask", ["taskId" => $task->id]) }}">Delete</a>
                                    </center>
                                     </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
        </div>
    </div>
</div>
@endsection
