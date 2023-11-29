@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>List Colors
                        <a href="{{ url('admin/colors/create') }}" class="btn btn-primary text-white btn-sm float-end">Add
                            Color</a>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Color</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($colors as $color)
                                <tr>
                                    <td>{{ $color->id }}</td>
                                    <td>{{ $color->name }}</td>
                                    <td>{{ $color->code }}</td>
                                    <td><label style="background-color: {{ $color->code }}; width: 30px; height: 30px;"></label></td>
                                    <td>{{ $color->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/colors/' . $color->id . '/edit') }}"
                                            class="btn btn-sm btn-success text-white">Edit</a>
                                        <a href="{{ url('admin/colors/' . $color->id . '/delete') }}"
                                            onclick="return confim('Are you sure, you want to delete this data?')"
                                            class="btn btn-sm btn-danger text-white">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No Color Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
