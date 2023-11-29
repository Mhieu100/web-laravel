@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>List Users
                        <a href="{{ url('admin/users/create') }}" class="btn btn-primary text-white btn-sm float-end">Add
                            Users</a>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->role_as == '0')
                                            <label class="badge btn-primary" for="">User</label>
                                        @else
                                            <label class="badge btn-danger" for="">Admin</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/users/' . $user->id . '/edit') }}"
                                            class="btn btn-sm btn-success text-white">Edit</a>
                                        <a href="{{ url('admin/users/' . $user->id . '/delete') }}"
                                            onclick="return confim('Are you sure, you want to delete this data?')"
                                            class="btn btn-sm btn-danger text-white">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No User Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
