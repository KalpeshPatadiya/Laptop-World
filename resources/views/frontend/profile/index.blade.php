@extends('layouts.front')

@section('title')
    My Profile
@endsection

@section('content')
    <div class="py-2 shadow-sm bg-info border-top">
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
            <div class="modal-content glass-card p-0 text-white">
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
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card glass p-0">
                    <div class="card-header">
                        <a class="btn btn-danger text-white m-2 float-end btn-delete" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Delete Account</a>
                        <a href="{{ url('my-profile/edit') }}" class="btn btn-warning btn-back m-2 float-end">Edit Profile</a>
                        <h3 class="m-2">My Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="row container">
                            <div class="col-md-4 mt-3">
                                <label>Name:</label>
                                <input class="form-control glass" value="{{ Auth::user()->name }} {{ Auth::user()->lname }}"
                                    disabled>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Email:</label>
                                <input class="form-control glass" value="{{ Auth::user()->email }}" disabled>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Phone Number:</label>
                                @if (Auth::user()->phone == null)
                                    <input class="text-danger form-control glass" value="Not Set" disabled>
                                @else
                                    <input class="form-control glass" value="{{ Auth::user()->phone }}" disabled>
                                @endif
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Gender:</label>
                                @if (Auth::user()->gender == null)
                                    <input class="text-danger form-control glass" value="Not Set" disabled>
                                @else
                                    <input class="form-control glass" value="{{ Auth::user()->gender }}" disabled>
                                @endif
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Date of Birth:</label>
                                @if (Auth::user()->dob == null)
                                    <input class="text-danger form-control glass" value="Not Set" disabled>
                                @else
                                    <input class="form-control glass" value="{{ Auth::user()->dob }}" disabled>
                                @endif
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Address:</label>
                                @if (Auth::user()->address1 == null && Auth::user()->address2 == null)
                                    <input class="text-danger form-control glass" value="Not Set" disabled>
                                @else
                                    <input class="form-control glass"
                                        value="{{ Auth::user()->address1 }}, {{ Auth::user()->address2 }}" disabled>
                                @endif
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>City:</label>
                                @if (Auth::user()->city == null)
                                    <input class="text-danger form-control glass" value="Not Set" disabled>
                                @else
                                    <input class="form-control glass" value="{{ Auth::user()->city }}" disabled>
                                @endif
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>State:</label>
                                @if (Auth::user()->state == null)
                                    <input class="text-danger form-control glass" value="Not Set" disabled>
                                @else
                                    <input class="form-control glass" value="{{ Auth::user()->state }}" disabled>
                                @endif
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Country:</label>
                                @if (Auth::user()->country == null)
                                    <input class="text-danger form-control glass" value="Not Set" disabled>
                                @else
                                    <input class="form-control glass" value="{{ Auth::user()->country }}" disabled>
                                @endif
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Pin Code:</label>
                                @if (Auth::user()->pincode == null)
                                    <input class="text-danger form-control glass" value="Not Set" disabled>
                                @else
                                    <input class="form-control glass" value="{{ Auth::user()->pincode }}" disabled>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
