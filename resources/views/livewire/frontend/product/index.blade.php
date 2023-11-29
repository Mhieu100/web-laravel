<div>

    <div class="container mt-4">
        <div class="row">
            @if ($category->brands)
                <div class="col-lg-3 p-4">
                    <div class="mb-4">
                        <h4>Thương hiệu</h4>
                        <div class="p-3">
                            @foreach ($category->brands as $item)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model="brandInputs"
                                        value="{{ $item->name }}" />
                                    <label class="form-check-label" for="flexCheckDefault">{{ $item->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <h4>Giá </h4>
                        <div class="p-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" wire:model="priceInput" name="priceSort"
                                    value="high-to-low" id="flexCheckDefault" />
                                <label class="form-check-label" for="1">Từ cao tới thấp</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" wire:model="priceInput" name="priceSort"
                                    value="low-to-high" id="flexCheckDefault" />
                                <label class="form-check-label" for="1">Từ thấp tới cao</label>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-lg-9">
                <div class="container p-4">
                    <div class="mb-4">
                        <h4>Tất cả sản phẩm của {{ $category->name }}</h4>
                        <div class="row">
                            @forelse ($products as $product)
                                <div class="col-sm-6 col-md-4 col-lg-3 mb-2 mb-lg-0">
                                    <div class="card mb-3">
                                        @if ($product->productImages()->count() > 0)
                                            <a
                                                href="{{ url('/collections/' . $product->category->name . '/' . $product->name) }}">
                                                <img src="{{ asset($product->productImages[0]->image) }}"
                                                    class="card-img-top" alt="{{ $product->name }}" />
                                                <div class="mask">
                                                    <div class="d-flex justify-content-end align-items-start h-100 p-2">
                                                        {{-- @if ($product->quantity > 0)
                                                        <h5><span class="badge bg-success pt-2 ms-3 text-light">In
                                                                Stock</span>
                                                        </h5>
                                                    @else
                                                        <h5><span class="badge bg-danger pt-2 ms-3 text-light">Out
                                                                Stock</span>
                                                        </h5>
                                                    @endif --}}
                                                        <h5><span
                                                                class="badge bg-success pt-2 ms-3 text-light">{{ $product->brand }}</span>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
                                        <div class="card-body">
                                            <a
                                                href="{{ url('/collections/' . $product->category->name . '/' . $product->name) }}">
                                                <p class="mb-0" style="font-size: 12px">{{ $product->name }}</p>
                                            </a>
                                            <div class="d-flex justify-content-between">
                                                <p class="small text-danger"><s>${{ $product->original_price }}</s></p>
                                                <h6 class="text-dark mb-0">${{ $product->selling_price }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-12">
                                    <div class="p-2">
                                        <h4>No Product Available</h4>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
