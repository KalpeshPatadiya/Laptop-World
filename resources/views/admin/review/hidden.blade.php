@extends('layouts.admin')

@section('title')
    Reviews
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md 12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Reviews
                            <a href="{{ 'reviews' }}" class="btn btn-warning float-end">Shown Reviews</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="datatable_review" data-order='[[ 0, "desc" ]]' class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Product Name</th>
                                    <th>Review</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->product->name }}</td>
                                        <td><textarea cols="50" rows="3" readonly>{{ $item->user_review }}</textarea>
                                        </td>
                                        <td>
                                            <a href="{{ url('show-review/' . $item->id) }}" class="btn btn-danger">Show</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#datatable_review').DataTable();
        });
    </script>
@endsection
