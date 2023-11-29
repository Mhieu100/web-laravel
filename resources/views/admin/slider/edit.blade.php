@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Slider
                        <a href="{{ url('admin/sliders') }}" class="btn btn-danger text-white btn-sm float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body bg-contents">
                    <form action="{{ url('admin/sliders/' . $slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="mb-3">Title</label>
                                    <input type="text" name="title" value="{{ $slider->title }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="mb-3">Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="mb-3">Description</label>
                            <textarea name="description" class="form-control" rows="10">{{ $slider->description }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="mb-3">Status</label> <br>
                                    <label class="switch">
                                        <input type="checkbox"{{ $slider->status == '1' ? 'checked' : '' }} name="status">
                                        <span class="slider round"></span>
                                    </label>
                                    <small>Checked = Hidden | Unchecked = Visible</small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <img src="{{ asset("$slider->image") }}" style="width: 70px; height: 70px" alt="">
                            </div>
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
