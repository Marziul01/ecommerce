@extends('admin.master')

@section('title')
    {{ $siteSettings->title }} | Profile Details
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-black text-center">Profile Details</h4>
                    </div>
                    <div class="card-body" style="display: flex; flex-direction: column; justify-content: center; align-items: center">
                        <img class="rounded-circle" src="{{ asset('admin-assets') }}/img/undraw_profile.svg" width="30%">

                        <h6 class="text-center py-3">@if($admin->role == 0) ADMIN @else USER @endif</h6>
                        <h5 class="text-center"><b>Username:</b> {{ $admin->name }}</h5>
                        <h5 class="text-center py-3"><b>Email:</b> {{ $admin->email }}</h5>
                        <a href="{{ route('profileSettings') }}" class="btn btn-sm btn-primary text-center">Change Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
