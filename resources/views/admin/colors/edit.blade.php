@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Color
                        <a href="{{ url('admin/colors') }}" class="btn btn-danger text-white btn-sm float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body  bg-contents">

                    <form action="{{ url('admin/colors/' . $color->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="mb-3">Name</label>
                                    <input type="text" name="name" value="{{ $color->name }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="mb-3">Code</label>
                                    <input type="text" name="code" value="{{ $color->code }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="mb-3">Status</label> <br>
                            <label class="switch">
                                <input type="checkbox" name="status" {{ $color->status == '1' ? 'checked' : '' }}>
                                <span class="slider round"></span>
                            </label>
                            <small>Checked = Hidden | Unchecked = Visible</small>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary text-white">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
