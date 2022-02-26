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
                        <h3>Reviews
                            <a href="{{ 'hidden-reviews' }}" class="btn btn-warning float-end">Hidden Reviews</a>
                        </h3>
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
                                        <td>{{ $item->user_review }}</td>
                                        <td>
                                            <a href="{{ url('hide-review/' . $item->id) }}" class="btn btn-danger">Hide</a>
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
