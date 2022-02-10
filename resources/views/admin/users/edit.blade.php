@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div>
                            <h4>Edit User Details
                                <a href="{{ '/users' }}" class="btn btn-warning float-end">Back</a>
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4>Current Role : {{ $users->role_as == '1' ? 'Admin' : 'User' }}</h4>
                        <form action="{{ url('update-users/' . $users->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <select name="roles" id="">
                                    <option value="">--- Select role ---</option>
                                    <option value="0">Default (User)</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
