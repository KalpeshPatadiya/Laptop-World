@extends('layouts.admin')

@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content glass-card p-0 text-white">
                <form action="{{ url('update-users/' . $users->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4>Current Role :
                            @if ($users->role_as == 0)
                                User
                            @elseif ($users->role_as == 1)
                                Admin
                            @elseif ($users->role_as == 2)
                                Manager
                            @endif
                        </h4>
                        <select name="role_as" id="custom-select" required id="inputGroup1">
                            <option value="">-- Select --</option>
                            <option value="0">User (default)</option>
                            <option value="1">Admin</option>
                            <option value="2">Manager</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Change</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div>
                            <h4>User Details
                                <a href="{{ '/users' }}" class="btn btn-warning float-end">Back</a>
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row order-details">
                            <div class="col-md-4">
                                <label for="">Role</label><a href="" class="btn btn-sm p-1 mb-0 btn-success float-end"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">Change Role</a>
                                <div class="py-2 border">{{ $users->role_as == '0' ? 'User' : 'Admin' }}</div>
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
                            @if ($users->role_as == '0')
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
