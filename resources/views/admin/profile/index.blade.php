@extends('layouts.admin')

@section('title')
    My Profile
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('admin-profile/edit') }}" class="btn btn-warning m-2 float-end">Edit Profile</a>
                        <h3 class="m-2">My Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="row container">
                            <div class="col-md-4 mt-3">
                                <label>Name:</label>
                                <input class="form-control" value="{{ Auth::user()->name }} {{ Auth::user()->lname }}"
                                    disabled>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Email:</label>
                                <input class="form-control" value="{{ Auth::user()->email }}" disabled>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Phone Number:</label>
                                @if (Auth::user()->phone == null)
                                    <input class="text-danger form-control" value="Not Set" disabled>
                                @else
                                    <input class="form-control" value="{{ Auth::user()->phone }}" disabled>
                                @endif
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Gender:</label>
                                @if (Auth::user()->gender == null)
                                    <input class="text-danger form-control" value="Not Set" disabled>
                                @else
                                    <input class="form-control" value="{{ Auth::user()->gender }}" disabled>
                                @endif
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Date of Birth:</label>
                                @if (Auth::user()->dob == null)
                                    <input class="text-danger form-control" value="Not Set" disabled>
                                @else
                                    <input class="form-control" value="{{ Auth::user()->dob }}" disabled>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
