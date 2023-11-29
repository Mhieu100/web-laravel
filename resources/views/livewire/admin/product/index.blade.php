<div>

    <div class="row">
        <div class="col-md-12 grid-margin">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>List Product
                        <a href="{{ url('admin/products/create') }}" class="btn btn-primary text-white btn-sm float-end">Add
                            Products</a>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td> <img src="{{ asset($product->productImages[0]->image) }}" class="card-img-top"
                                                alt="{{ $product->name }}" /></td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        @if ($product->brand)
                                             {{ $product->brand }}
                                        @else
                                            No Brand
                                        @endif
                                    </td>
                                    <td>
                                        @if ($product->category)
                                             {{ $product->category->name }}
                                        @else
                                            No Category
                                        @endif
                                    </td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
                                        <a href="{{ url('admin/products/' . $product->id . '/edit') }}" class="btn btn-sm btn-success text-white">Edit</a>
                                        <a href="{{ url('admin/products/' . $product->id . '/delete') }}" onclick="return confim('Are you sure, you want to delete this data?')" class="btn btn-sm btn-danger text-white">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No Products Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                     <div class="mt-2">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
