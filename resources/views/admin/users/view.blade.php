@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h4>User Details
                                <a href="{{ '/users' }}" class="btn btn-warning float-end">Back</a>
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row order-details">
                            <div class="col-md-4">
                                <label for="">Role</label>
                                <div class="p-2 border">{{ $users->role_as == '0' ? 'User' : 'Admin' }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="">First Name</label>
                                <div class="p-2 border">
                                    @if ($users->name == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        {{ $users->name }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Last Name</label>
                                <div class="p-2 border">
                                    @if ($users->lname == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        {{ $users->lname }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">E-mail</label>
                                <div class="p-2 border">
                                    @if ($users->email == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        {{ $users->email }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Phone</label>
                                <div class="p-2 border">
                                    @if ($users->phone == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        {{ $users->phone }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Address 1</label>
                                <div class="p-2 border">
                                    @if ($users->address1 == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        {{ $users->address1 }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Address 2</label>
                                <div class="p-2 border">
                                    @if ($users->address2 == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        {{ $users->address2 }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">City</label>
                                <div class="p-2 border">
                                    @if ($users->city == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        {{ $users->city }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">State</label>
                                <div class="p-2 border">
                                    @if ($users->state == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        {{ $users->state }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Country</label>
                                <div class="p-2 border">
                                    @if ($users->country == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        {{ $users->country }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Pin Code</label>
                                <div class="p-2 border">
                                    @if ($users->pincode == null)
                                        <span class="text-danger">Not Set</span>
                                    @else
                                        {{ $users->pincode }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
