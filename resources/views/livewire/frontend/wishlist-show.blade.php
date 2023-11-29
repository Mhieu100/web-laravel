<div>

    <div class="container h-100 py-5">
        <h4 style="text-align: center;" class="mb-3">Danh sách yêu thích</h4>
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">
                @forelse ($wishlist as $itemWishlist)
                    @if ($itemWishlist->product)
                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-3">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2">
                                        <a
                                            href="{{ url('collections/' . $itemWishlist->product->category->slug . '/' . $itemWishlist->product->slug) }}">
                                            <img src="{{ $itemWishlist->product->productImages[0]->image }}"
                                                class="img-fluid rounded-3" alt="{{ $itemWishlist->product->name }}">
                                        </a>
                                    </div>
                                    <div class="col-md-3 col-lg-5">
                                        <a
                                            href="{{ url('collections/' . $itemWishlist->product->category->name . '/' . $itemWishlist->product->name) }}">
                                            <h4 class="lead fw-bold mb-2">{{ $itemWishlist->product->name }}</h4>
                                        </a>
                                    </div>
                                    <div class="col-md-3 col-lg-2">
                                        <h5 class="mb-0">${{ $itemWishlist->product->selling_price }}</h5>
                                    </div>
                                    <div class="col-md-1 col-lg-3 text-end">
                                        <button type="button" href=""
                                            wire:click="removeWishlish({{ $itemWishlist->id }})"
                                            class="btn btn-danger btn-sm me-1 mb-2">
                                            <span wire:loading.remove
                                                wire:target="removeWishlish({{ $itemWishlist->id }})">
                                                <i class="fa fa-trash"></i> Xóa
                                            </span>
                                            <span wire:loading wire:target="removeWishlish({{ $itemWishlist->id }})">
                                                <i class="fa fa-trash"></i> Xóa...</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="card rounded-3 mb-4">
                        <div class="card-body p-3">
                            <h4 class="p-3 text-center">Không có sản phẩm được thêm</h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

</div>
