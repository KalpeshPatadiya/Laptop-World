@extends('layouts.retailer')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body card-gradiant p-3">
                            <p class="mb-0 fw-bold fs-4">Shippded Orders : {{ $shipped->count() }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body card-gradiant p-3">
                            <p class="mb-0 fw-bold fs-4">Delivered Orders : {{ $delivered->count() }}
                                <i class="dash-icon bi-ui-checks-grid text-warning"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body card-gradiant p-3">
                            <p class="mb-0 fw-bold fs-4">Cancelled Orders : {{ $cancelled->count() }}
                                <i class="dash-icon bi-clipboard-check text-danger"></i>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
