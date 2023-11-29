@extends('layouts.app')

@section('title', 'Profile Page')

@section('content')

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">{{ Auth::user()->name }}</h5>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="{{ url('change-pass') }}" class="btn btn-primary">Change Password</a>
                            <a href="{{ url('orders') }}" class="btn btn-outline-primary ms-1">My Order</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        @if (session('message'))
                            <p class="alert alert-success">{{ session('message') }}</p>
                        @endif
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $errors)
                                    <li class="text-danger">{{ $errors }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ url('/profile') }}" method="post">
                            @csrf
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="username" value="{{ Auth::user()->name }}" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" readonly value="{{ Auth::user()->email }}" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Phone</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="phone" value="{{ Auth::user()->userDetail->phone ?? '' }}" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Pin Code</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="pin_code" value="{{ Auth::user()->userDetail->pin_code ?? '' }}" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-9">
                                <textarea type="text" name="address" class="form-control" rows="2">{{ Auth::user()->userDetail->address ?? '' }}</textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
