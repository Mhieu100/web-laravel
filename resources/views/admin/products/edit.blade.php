@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Product
                        <a href="{{ url('admin/products') }}" class="btn btn-danger text-white btn-sm float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body  bg-contents">

                    @if (session('message'))
                        <div class="alert alert-success">

                            <div>{{ session('message') }}</div>

                        </div>
                    @endif

                    <form action="{{ url('admin/products/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

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
                                            <input type="text" name="name" value="{{ $product->name }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="mb-3">Category</label>
                                            <select name="category_id" class="form-control p-3">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="mb-3">Brand</label>
                                            <select name="brand" class="form-control p-3">
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->name }}"
                                                        {{ $brand->name == $product->brand ? 'selected' : '' }}>
                                                        {{ $brand->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="mb-3">Original Price</label>
                                            <input type="number" name="original_price"
                                                value="{{ $product->original_price }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="mb-3">Selling Price</label>
                                            <input type="number" name="selling_price"
                                                value="{{ $product->selling_price }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="mb-3">Quantity</label>
                                            <input type="number" name="quantity" value="{{ $product->quantity }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="mb-3">Trending</label>
                                            <label class="switch">
                                                <input type="checkbox" name="trending"
                                                    {{ $product->trending == '1' ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="mb-3">Featured</label>
                                            <label class="switch">
                                                <input type="checkbox" name="featured"
                                                    {{ $product->featured == '1' ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="mb-3">Status</label>
                                            <label class="switch">
                                                <input type="checkbox" name="status"
                                                    {{ $product->status == '1' ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="mb-3">Description</label>
                                        <textarea type="text" name="description" class="form-control" rows="10">{{ $product->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab"
                                tabindex="0">
                                <div class="mb-3">
                                    <label class="mb-3">Upload Product Images</label>
                                    <input type="file" name="image[]" multiple class="form-control">
                                </div>
                                <div class="mb-3">
                                    @if ($product->productImages)
                                        <div class="row">
                                            @foreach ($product->productImages as $image)
                                                <div class="col-lg-3 mb-3">
                                                    <img src="{{ asset($image->image) }}" class="me-4" width="100px">
                                                    <a href="{{ url('admin/product-image/' . $image->id . '/delete') }}"
                                                        class="btn btn-sm btn-danger text-white">Remove</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <h5>No Image Add</h5>
                                    @endif
                                </div>
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
                                                {{ $color->name }} <br> <br>
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
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product->productColors as $prodColor)
                                                <tr class="prod_color_tr">
                                                    @if ($prodColor->color)
                                                        <td>{{ $prodColor->color->name }}</td>
                                                    @else
                                                        <td>Not Color Foud</td>
                                                    @endif
                                                    <td>
                                                        <div class="input-group mb-3" style="width: 150px">
                                                            <input type="text"
                                                                class="productColorQuantity form-control form-control-sm"
                                                                value="{{ $prodColor->quantity }}">
                                                            <button type="button"
                                                                class="updateProductColorBtn btn btn-primary text-white btn-sm"
                                                                value="{{ $prodColor->id }}">Update</button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                            class="deleteProductColorBtn btn btn-danger btn-sm text-white"
                                                            value="{{ $prodColor->id }}">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="mx-3">
                            <button type="submit" class="btn btn-primary text-white">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.updateProductColorBtn', function() {
                var product_id = "{{ $product->id }}";
                var prod_color_id = $(this).val();
                var qty = $(this).closest('.prod_color_tr').find('.productColorQuantity').val();

                // alert(prod_color_id);

                if (qty <= 0) {
                    alert('Quantity is required');
                    return false;
                }

                var data = {
                    'product_id': product_id,
                    'qty': qty,
                };

                $.ajax({
                    type: 'POST',
                    url: '/admin/product-color/' + prod_color_id,
                    data: data,
                    success: function(response) {
                        alert(response.message)
                    }
                })
            });
            $(document).on('click', '.deleteProductColorBtn', function() {
                // var product_id = "{{ $product->id }}";
                var prod_color_id = $(this).val();
                var thisClick = $(this);
                thisClick.closest('.prod_color_tr').remove();

                $.ajax({
                    type: 'GET',
                    url: '/admin/product-color/' + prod_color_id + '/delete',
                    success: function(response) {
                        thisClick.closest('.prod_color_tr').remove();
                        alert(response.message)
                    }
                })
            });
        });
    </script>
@endsection
