@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>Add User
                        <a href="{{ url('admin/users') }}" class="btn btn-danger text-white btn-sm float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body  bg-contents">
                    <form action="{{ url('admin/users') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="mb-3">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-3">Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-3">Password</label>
                                <input type="text" name="password" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-3">Select Role</label>
                                <select name="role_as" class="form-control p-3" id="">
                                    <option value="">Select Role</option>
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary text-white" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
