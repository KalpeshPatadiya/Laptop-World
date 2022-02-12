@extends('layouts.front')

@section('title')
    My Profile
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-info border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a href="{{ url('my-profile') }}">
                    My Profile
                </a>
            </h6>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action= "{{ url('my-profile/delete/' . $profile->id)}}"  method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-danger m-2 float-end" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Delete Account</a>
                        <a href="{{ url('my-profile/edit') }}" class="btn btn-warning m-2 float-end">Edit Profile</a>
                        <h3 class="m-2">My Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="row container">
                            <div class="col-md-5 fs-5 fw-bold mt-3">
                                <label>Name :</label>
                            </div>
                            <div class="col-md-7 fs-5 mt-3">
                                <input value="{{ Auth::user()->name }} {{ Auth::user()->lname }}" disabled>
                            </div>
                            <div class="col-md-5 fs-5 fw-bold mt-3">
                                <label>E-mail :</label>
                            </div>
                            <div class="col-md-7 fs-5 mt-3">
                                <input value="{{ Auth::user()->email }}" disabled>
                            </div>
                            <div class="col-md-5 fs-5 fw-bold mt-3">
                                <label>Phone Number :</label>
                            </div>
                            <div class="col-md-7 fs-5 mt-3">
                                <label>
                                    @if (Auth::user()->phone == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        <input value="{{ Auth::user()->phone }}" disabled>
                                    @endif
                                </label>
                            </div>
                            <div class="col-md-5 fs-5 fw-bold mt-3">
                                <label>Gender :</label>
                            </div>
                            <div class="col-md-7 fs-5 mt-3">
                                <label>
                                    @if (Auth::user()->gender == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        <input value="{{ Auth::user()->gender }}" disabled>
                                    @endif
                                </label>
                            </div>
                            <div class="col-md-5 fs-5 fw-bold mt-3">
                                <label>Date of Birth :</label>
                            </div>
                            <div class="col-md-7 fs-5 mt-3">
                                <label>
                                    @if (Auth::user()->dob == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        <input value="{{ Auth::user()->dob }}" disabled>
                                    @endif
                                </label>
                            </div>
                            <div class="col-md-5 fs-5 fw-bold mt-3">
                                <label>Address :</label>
                            </div>
                            <div class="col-md-7 fs-5 mt-3">
                                <label>
                                    @if (Auth::user()->address1 == null && Auth::user()->address2 == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        <input value="{{ Auth::user()->address1 }}, {{ Auth::user()->address2 }}" disabled>
                                    @endif
                                </label>
                            </div>
                            <div class="col-md-5 fs-5 fw-bold mt-3">
                                <label>City :</label>
                            </div>
                            <div class="col-md-7 fs-5 mt-3">
                                <label>
                                    @if (Auth::user()->city == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        <input value="{{ Auth::user()->city }}" disabled>
                                    @endif
                                </label>
                            </div>
                            <div class="col-md-5 fs-5 fw-bold mt-3">
                                <label>State :</label>
                            </div>
                            <div class="col-md-7 fs-5 mt-3">
                                <label>
                                    @if (Auth::user()->state == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        <input value="{{ Auth::user()->state }}" disabled>
                                    @endif
                                </label>
                            </div>
                            <div class="col-md-5 fs-5 fw-bold mt-3">
                                <label>Country :</label>
                            </div>
                            <div class="col-md-7 fs-5 mt-3">
                                <label>
                                    @if (Auth::user()->country == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        <input value="{{ Auth::user()->country }}" disabled>
                                    @endif
                                </label>
                            </div>
                            <div class="col-md-5 fs-5 fw-bold mt-3">
                                <label>Pin Code :</label>
                            </div>
                            <div class="col-md-7 fs-5 mt-3">
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
