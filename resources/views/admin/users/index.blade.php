@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header pb-2">
            <div>
                <h4>Registered Users</h4>
            </div>
        </div>
        <div class="card-body">
            <table id="datatable_user" class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name . ' ' . $item->lname }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role_as == '1' ? 'Admin' : 'User' }}</td>
                            <td>
                                <a href="{{ url('view-user/' . $item->id) }}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#datatable_user').DataTable();
        });
    </script>
@endsection
