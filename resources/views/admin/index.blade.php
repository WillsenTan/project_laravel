@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Administrator</div>

                <div class="card-body" align="center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as Administrator!

                    <center><a class="nav-link" href="{{ route('admin.indexuser') }}">{{ __('Registered User') }}</a></center>
                    <center><a class="nav-link" href="{{ route('admin.indextask') }}">{{ __('All User Task') }}</a></center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
