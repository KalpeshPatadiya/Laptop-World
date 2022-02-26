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
                </a>&gt;
                <a href="{{ url('my-profile/edit') }}">
                    Edit Profile
                </a>
            </h6>
        </div>
    </div>
    <div class="container pt-5">
        <form action="{{ url('update-profile') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card glass p-0">
                        <div class="card-header">
                            <a href="{{ url('my-profile') }}" class="btn btn-warning btn-back m-2 float-end">Back</a>
                            <h3 class="m-2">Edit Profile</h3>
                        </div>
                        <div class="card-body">
                            <div class="row container">
                                <div class="col-md-4 mt-3">
                                    <label for="name_validate">First Name</label>
                                    <input type="text" id="name_validate" class="form-control glass"
                                        value="{{ Auth::user()->name }}" name="fname" placeholder="Enter First Name">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="lname_validate">Last Name</label>
                                    <input type="text" id="lname_validate" class="form-control glass"
                                        value="{{ Auth::user()->lname }}" name="lname" placeholder="Enter Last Name">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="email_validate">Email</label>
                                    <input type="text" id="email_validate" class="form-control glass"
                                        value="{{ Auth::user()->email }}" name="email" placeholder="Enter Email">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="phone_validate">Phone Number</label>
                                    <input type="number" id="phone_validate" class="form-control glass"
                                        value="{{ Auth::user()->phone }}" name="phone" placeholder="Enter Phone Number">
                                </div>
                                <div class="col-md-4 p-3 mt-3">
                                    <label for="gender_validate">Gender</label>
                                    <input type="radio" id="gender_validate"
                                        {{ Auth::user()->gender == 'Male' ? 'checked' : '' }} value="Male" name="gender">
                                    Male
                                    <input type="radio" id="gender_validate"
                                        {{ Auth::user()->gender == 'Female' ? 'checked' : '' }} value="Female"
                                        name="gender"> Female
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="dob_validate">Date of Birth</label>
                                    <input type="date" id="dob_validate" class="form-control glass"
                                        value="{{ Auth::user()->dob }}" name="dob" required>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="add1_validate">Address 1</label>
                                    <input type="text" id="add1_validate" class="form-control glass"
                                        value="{{ Auth::user()->address1 }}" name="address1"
                                        placeholder="Enter Address 1">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="add2_validate">Address 2</label>
                                    <input type="text" id="add2_validate" class="form-control glass"
                                        value="{{ Auth::user()->address2 }}" name="address2"
                                        placeholder="Enter Address 2">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="city_validate">City</label>
                                    <input type="text" id="city_validate" class="form-control glass"
                                        value="{{ Auth::user()->city }}" name="city" placeholder="Enter City">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="state_validate">State</label>
                                    <input type="text" id="state_validate" class="form-control glass"
                                        value="{{ Auth::user()->state }}" name="state" placeholder="Enter State">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="country_validate">Country</label>
                                    <input type="text" id="country_validate" class="form-control glass"
                                        value="{{ Auth::user()->country }}" name="country" placeholder="Enter Country">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="pin_validate">Pin Code</label>
                                    <input type="number" id="pin_validate" class="form-control glass"
                                        value="{{ Auth::user()->pincode }}" name="pincode" placeholder="Enter Pin Code">
                                </div>
                                <div class="col-md-12">
                                    <button type="submit"
                                        class=" col-md-2 btn btn-success mt-3 fs-5 float-end">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
