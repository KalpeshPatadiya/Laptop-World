@extends('layouts.admin')

@section('title')
    Reviews
@endsection

@section('content')

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach ($reviews as $item)
                        {{ $item->id }}->{{ $item->user_review }},
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md 12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Reviews
                            <a href="{{ 'hidden-reviews' }}" class="btn btn-warning float-end">Hidden Reviews</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="datatable_review" data-order='[[ 0, "desc" ]]' class="table table-striped"
                            style="width: 100%">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Product Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $item)
                                    <tr>
                                        <input type="hidden" value="{{ $item->id }}" class="review_id">
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->product->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                View
                                            </button>
                                            <a href="{{ url('hide-review/' . $item->id) }}"
                                                class="btn btn-danger">Hide</a>
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
