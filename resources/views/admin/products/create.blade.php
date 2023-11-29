@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h3>Add Product
                        <a href="{{ url('admin/products') }}" class="btn btn-danger text-white btn-sm float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body  bg-contents">

                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="details-tab" data-bs-toggle="tab"
                                    data-bs-target="#details-tab-pane" type="button" role="tab"
                                    aria-controls="details-tab-pane" aria-selected="false">Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                    data-bs-target="#image-tab-pane" type="button" role="tab"
                                    aria-controls="image-tab-pane" aria-selected="false">Image</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="color-tab" data-bs-toggle="tab"
                                    data-bs-target="#color-tab-pane" type="button" role="tab"
                                    aria-controls="color-tab-pane" aria-selected="false">Color</button>
                            </li>
                        </ul>
                        <div class="tab-content p-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="details-tab-pane" role="tabpanel"
                                aria-labelledby="details-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="mb-3">Product Name</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="mb-3">Category</label>
                                            <select name="category_id" class="form-control p-3">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="mb-3">Brand</label>
                                            <select name="brand" class="form-control p-3">
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="mb-3">Original Price</label>
                                            <input type="number" name="original_price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="mb-3">Selling Price</label>
                                            <input type="number" name="selling_price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="mb-3">Quantity</label>
                                            <input type="number" name="quantity" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="mb-3">Trending</label>
                                            <label class="switch">
                                                <input type="checkbox" name="trending">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="mb-3">Featured</label>
                                            <label class="switch">
                                                <input type="checkbox" name="featured">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="mb-3">Status</label>
                                            <label class="switch">
                                                <input type="checkbox" name="status">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="mb-3">Description</label>
                                        <textarea type="text" name="description" class="form-control" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab"
                                tabindex="0">
                                <label class="mb-3">Upload Product Images</label>
                                <input type="file" name="image[]" multiple class="form-control">
                            </div>
                            <div class="tab-pane fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab"
                                tabindex="0">
                                <label class="mb-3">Select Color Product</label>
                                <div class="row">
                                    @forelse ($colors as $color)
                                        <div class="col-md-3">
                                            <div class="p-2 border mb-3">
                                                Color :
                                                <label class="switch">
                                                    <input type="checkbox" name="colors[{{ $color->id }}]"
                                                        value="{{ $color->id }}">
                                                    <span class="slider round"></span>
                                                </label>
                                                {{ $color->name }} <br><br>
                                                Quantity <input type="number" name="colorquantity[{{ $color->id }}]"
                                                    style="width: 70px ;border: 1px solid">
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-md-12">
                                            <h1>No Colors Foud</h1>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="mx-4">
                            <button type="submit" class="btn btn-primary text-white">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
