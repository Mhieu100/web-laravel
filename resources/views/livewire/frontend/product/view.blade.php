<div>

    <div class="container p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="images p-3">
                                <div class="text-center p-4"> <img id="main-image"
                                        src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}"
                                        width="250" /> </div>
                                <div class="thumbnail text-center">

                                    @foreach ($product->productImages as $imageItem)
                                        <img onclick="change_image(this)" src="{{ asset($imageItem->image) }}"
                                            width="70">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product p-4">
                                <div class="mt-4 mb-3"> <span class="text-ca text-capitalize brand">
                                        <p class="product-path">
                                            Home / {{ $product->category->name }} / {{ $product->name }}
                                        </p>
                                    </span>
                                    <h5 class="text-uppercase">{{ $product->name }}</h5>
                                    <div class="price d-flex flex-row align-items-center"> <span class="act-price">
                                        ${{ $product->selling_price }}</span>
                                        <div style="margin-left: 15px"> <small
                                                class="dis-price">${{ $product->original_price }}</small>
                                        </div>
                                    </div>
                                </div>
                                <p class="about">{{ $product->description }}</p>
                                <div class="sizes mt-4">
                                    <h6 class="text-capitalize">Màu</h6>
                                    <div>
                                        @if ($product->productColors->count() > 0)
                                            @if ($product->productColors)
                                                @foreach ($product->productColors as $colorItem)
                                                    <label class="colorSelectionLabel"
                                                        style="width: 30px;height: 30px;border-radius: 50%;background-color: {{ $colorItem->color->code }}"
                                                        wire:click="colorSelected({{ $colorItem->id }})">
                                                    </label>
                                                @endforeach
                                            @endif
                                        @else
                                            @if ($product->quantity)
                                                <label class="btn btn-sm py-1 mt-2 text-white bg-success">Còn hàng</label>
                                            @else
                                                <label class="btn btn-sm py-1 mt-2 text-white bg-danger">Hết hàng</label>
                                            @endif
                                        @endif
                                    </div>
                                    <div>
                                        @if ($this->prodColorSelectedQuantity == 'outofStock')
                                            <label class="btn btn-sm py-1 mt-2 text-white bg-danger">Hết hàng</label>
                                        @elseif ($this->prodColorSelectedQuantity > 0)
                                            <label class="btn btn-sm py-1 mt-2 text-white bg-success">Còn hàng</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <h6 class="text-capitalize">Số lượng</h6>
                                    <div class="input-group">
                                        <span class="btn btn-danger" wire:click="decrementQuantity"><i
                                                class="fa fa-minus"></i></span>
                                        <input type="text" wire:model="quantityCount"
                                            value="{{ $this->quantityCount }}" readonly
                                            style="width: 30px; border: none; outline:none" class="text-center" />
                                        <span class="btn btn-danger" wire:click="incrementQuantity"><i
                                                class="fa fa-plus"></i></span>
                                    </div>
                                </div>
                                <div class="cart mt-4 align-items-center">
                                    <button class="btn btn-danger text-uppercase mr-2 px-4" type="buttom"
                                        wire:click="addToCart({{ $product->id }})"><i
                                            class="fa fa-cart-arrow-down"></i> Thêm giỏ hàng</button>
                                    <button class="btn btn-danger text-uppercase mr-2 px-4" type="button"
                                        wire:click="addToWishList({{ $product->id }})">
                                        <span wire:loading.remove wire:target="addToWishList">
                                            <i class="fa fa-heart"></i> Danh sánh yêu thích
                                        </span>
                                        <span wire:loading wire:target="addToWishList">Thêm...</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        function change_image(image) {
            var container = document.getElementById("main-image");
            container.src = image.src;
        }
        document.addEventListener("DOMContentLoaded", function(event) {});
    </script>
@endpush
