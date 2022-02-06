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
                        <a href="{{ url('my-profile/edit') }}" class="btn btn-warning m-2 float-end">Edit Profile</a>
                        <h3 class="m-2">My Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="row container">
                            <div class="col-md-5 mt-3">
                                <label>Name :</label>
                            </div>
                            <div class="col-md-7 mt-3">
                                <input value="{{ Auth::user()->name }} {{ Auth::user()->lname }}" disabled>
                            </div>
                            <div class="col-md-5 mt-3">
                                <label>E-mail :</label>
                            </div>
                            <div class="col-md-7 mt-3">
                                <input value="{{ Auth::user()->email }}" disabled>
                            </div>
                            <div class="col-md-5 mt-3">
                                <label>Phone Number :</label>
                            </div>
                            <div class="col-md-7 mt-3">
                                <label>
                                    @if (Auth::user()->phone == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        <input value="{{ Auth::user()->phone }}" disabled>
                                    @endif
                                </label>
                            </div>
                            <div class="col-md-5 mt-3">
                                <label>Gender :</label>
                            </div>
                            <div class="col-md-7 mt-3">
                                <label>
                                    @if (Auth::user()->gender == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        <input value="{{ Auth::user()->gender }}" disabled>
                                    @endif
                                </label>
                            </div>
                            <div class="col-md-5 mt-3">
                                <label>Date of Birth :</label>
                            </div>
                            <div class="col-md-7 mt-3">
                                <label>
                                    @if (Auth::user()->dob == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        <input value="{{ Auth::user()->dob }}" disabled>
                                    @endif
                                </label>
                            </div>
                            <div class="col-md-5 mt-3">
                                <label>Address :</label>
                            </div>
                            <div class="col-md-7 mt-3">
                                <label>
                                    @if (Auth::user()->address1 == null && Auth::user()->address2 == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        <input value="{{ Auth::user()->address1 }}, {{ Auth::user()->address2 }}"
                                            disabled>
                                    @endif
                                </label>
                            </div>
                            <div class="col-md-5 mt-3">
                                <label>City :</label>
                            </div>
                            <div class="col-md-7 mt-3">
                                <label>
                                    @if (Auth::user()->city == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        <input value="{{ Auth::user()->city }}" disabled>
                                    @endif
                                </label>
                            </div>
                            <div class="col-md-5 mt-3">
                                <label>State :</label>
                            </div>
                            <div class="col-md-7 mt-3">
                                <label>
                                    @if (Auth::user()->state == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        <input value="{{ Auth::user()->state }}" disabled>
                                    @endif
                                </label>
                            </div>
                            <div class="col-md-5 mt-3">
                                <label>Country :</label>
                            </div>
                            <div class="col-md-7 mt-3">
                                <label>
                                    @if (Auth::user()->country == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        <input value="{{ Auth::user()->country }}" disabled>
                                    @endif
                                </label>
                            </div>
                            <div class="col-md-5 mt-3">
                                <label>Pin Code :</label>
                            </div>
                            <div class="col-md-7 mt-3">
                                <label>
                                    @if (Auth::user()->pincode == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        <input value="{{ Auth::user()->pincode }}" disabled>
                                    @endif
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection