    @extends('layouts.master')

    @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center"><h3>Your Task List</h3>
                </div>
            <div class="card-body">
                <div class="col-md-12">
                    <center><a href="{{ URL('task/create')}}" class="btn btn-link btn-xs"><h5>New Task</h5></a></center>
                    <div class="table-responsive">    
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Task Details</th>
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
                                    <td>
                                    <center>
                                <a href="{{ URL('task/' . $task->id.'/edit') }}" class="btn btn-md btn-link">Edit</a>
                                <form action="{{ URL('task/' . $task->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE')}}
                                    <button type="submit" class="btn btn-md btn-link">Delete</button>
                                </form>
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
