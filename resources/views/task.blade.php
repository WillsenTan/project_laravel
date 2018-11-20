    @extends('layouts.master')

    @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center">Your Task List</div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Task </th>
                                    <th> </th>
                                    <th>
                                    <a href="{{ URL('task/create')}}" class="btn btn-success btn-xs">New Task</a>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                <!-- ($tasks as $key => $task) -->
                                <tr>
                                    <td>{{ $task->task_name }} </td>
                                    <td>{{ $task->user_id }} </td>
                                    <td>
                                    <center>
                                <a href="{{ URL('task/' . $task->id.'/edit') }}" class="btn btn-xs btn-info">Edit</a>
                                <form action="{{ URL('task/' . $task->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE')}}
                                    <button type="submit" class="btn btn-xs btn-danger">Delete</button>

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
