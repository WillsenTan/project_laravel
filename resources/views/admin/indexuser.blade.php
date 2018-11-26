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
                <div class="card-header" align="center"><h3>Registered User List</h3>
                </div>
            <div class="card-body">
                <div class="col-md-12">
                    <center><a href="{{ route('admin.userCreate')}}" class="btn btn-link btn-xs"><h5>New User</h5></a></center>
                    <div class="table-responsive">    
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            @if (session("success"))
                            <div class="alert alert-success">
                                {{ session("success") }}
                            </div>
                        @endif
                            <tbody>
                                @foreach ($users as $user)
                                <!-- ($tasks as $key => $task) -->
                                <tr>
                                    <td>{{ $user->id }} </td>
                                    <td>{{ $user->name }} </td>
                                    <td>{{ $user->email }} </td>
                                    <td>
                                        <center>
                                         <a href="{{ route("admin.taskCreate", ["userId" => $user->id]) }}">New Task | </a>
                                         <a href="{{ route("admin.edituser", ["userId" => $user->id]) }}">Edit | </a>
                                         <a href="{{ route("admin.deleteuser", ["userId" => $user->id]) }}">Delete</a></center>
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
