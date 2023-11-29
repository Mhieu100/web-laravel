@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="me-md-3 me-xl-5">
                <h2>Dashboards</h2>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label for="">Total Orders</label>
                        <h1>{{ $totalOrder }}</h1>
                        <a href="{{ url('admin/orders') }}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3">
                        <label for="">Orders Today</label>
                        <h1>{{ $totalOrderToday }}</h1>
                        <a href="{{ url('admin/orders') }}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-danger text-white mb-3">
                        <label for="">Orders In Month</label>
                        <h1>{{ $totalOrderInMonth }}</h1>
                        <a href="{{ url('admin/orders') }}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3">
                        <label for="">Orders In Year</label>
                        <h1>{{ $totalOrderInYear }}</h1>
                        <a href="{{ url('admin/orders') }}" class="text-white">View</a>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label for="">Total Product</label>
                        <h1>{{ $totalProduct }}</h1>
                        <a href="{{ url('admin/products') }}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3">
                        <label for="">Total Category</label>
                        <h1>{{ $totalCategory }}</h1>
                        <a href="{{ url('admin/category') }}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-danger text-white mb-3">
                        <label for="">Total Brand</label>
                        <h1>{{ $totalBrand }}</h1>
                        <a href="{{ url('admin/brands') }}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3">
                        <label for="">Total User</label>
                        <h1>{{ $totalUser }}</h1>
                        <a href="{{ url('admin/orders') }}" class="text-white">View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
