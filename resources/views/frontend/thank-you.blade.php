@extends('layouts.app')

@section('title', 'Thank you')

@section('content')

    <div class="py-3 mt-3 pyt-md-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if(session('message'))
                        <h5 class="alert alert-success">{{ session('message') }}</h5>
                    @endif
                    <div class="p-4 shadow bg-white">
                        <img src="{{ asset('assets/img/logo.png') }}" height="50" loading="lazy" style="margin-top: -1px;" />
                        <h4 class="py-5">Cảm ơn quý khách đã đặt hàng tại Website của chúng tôi</h4>
                        <a href="{{ url('/') }}" class="btn btn-primary">Tiếp tục mua hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
