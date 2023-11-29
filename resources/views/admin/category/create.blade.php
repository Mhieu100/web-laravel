@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h3>Add Category
                        <a href="{{ url('admin/category') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body bg-contents">
                    <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="mb-3">Name</label>
                                <input type="text" name="name" class="form-control">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-3">Image</label>
                                <input type="file" name="image" class="form-control">
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-3">Status</label> <br>
                                <label class="switch">
                                    <input type="checkbox" name="status">
                                    <span class="slider round"></span>
                                </label>
                                 <small>Checked = Hidden | Unchecked = Visible</small>
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary text-white float-end">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
