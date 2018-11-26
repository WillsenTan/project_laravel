@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" align="center"><h3>User Details</h3></div>

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

                        @if (session("success"))
                            <div class="alert alert-success">
                                {{ session("success") }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('admin.updateuser', ['userId' => $user->id]) }}">
                            @csrf
                            <div class="form-group row">
                                <label for="id" class="col-sm-4 col-form-label text-md-right">ID</label>

                                <div class="col-md-6">
                                    <input id="id" type="text" class="form-control" name="id" value="{{ $user->id }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}">
                                </div>
                            </div>
                            <center><button type="submit" class="btn btn-success">Save</button>
                            <a href="{{ route("admin.indexuser") }}" class="btn btn-primary">Cancel</a></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection