@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h3>Add Slider
                        <a href="{{ url('admin/sliders') }}" class="btn btn-danger text-white btn-sm float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body bg-contents">

                    <form action="{{ url('admin/sliders/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <label class="mb-3">Title</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="mb-3">
                                    <label class="mb-3">Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="mb-3">Description</label>
                            <textarea name="description" class="form-control" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="mb-3">Status</label> <br>
                            <label class="switch">
                                <input type="checkbox" name="status">
                                <span class="slider round"></span>
                            </label> <small>Checked = Hidden | Unchecked = Visible</small>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary text-white">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
