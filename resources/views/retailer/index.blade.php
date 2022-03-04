@extends('layouts.retailer')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body card-gradiant p-3">
                            <p class="mb-0 fw-bold fs-4">Pending Orders : {{ $corfirmed->count() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
