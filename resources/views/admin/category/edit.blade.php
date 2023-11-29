@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Category
                        <a href="{{ url('admin/category') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body  bg-contents">
                    <form action="{{ url('admin/category/' . $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="mb-3">Name</label>
                                <input type="text" name="name" value="{{ $category->name }}" class="form-control">
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
                                    <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' : '' }}>
                                    <span class="slider round"></span>
                                </label>
                                <small>Checked = Hidden | Unchecked = Visible</small>
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <img src="{{ asset($category->image) }}" width="60px" height="60px" alt="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary text-white float-end">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
