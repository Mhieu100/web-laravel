<div>

    <section class="h-100 gradient-custom">
        <div class="container">
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Giỏ hàng</h5>
                        </div>
                        <div class="card-body">
                            @forelse ($cart as $itemCart)
                                @if ($itemCart->product)
                                    <div class="row">
                                        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                            <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                                data-mdb-ripple-color="light">
                                                @if ($itemCart->product->productImages)
                                                    <img src="{{ asset($itemCart->product->productImages[0]->image) }}"
                                                        class="w-100" alt="{{ $itemCart->product->name }}" />
                                                @endif
                                                <a
                                                    href="{{ url('collections/' . $itemCart->product->category->slug . '/' . $itemCart->product->slug) }}">
                                                    <div class="mask"
                                                        style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                            <a
                                                href="{{ url('collections/' . $itemCart->product->category->slug . '/' . $itemCart->product->slug) }}">
                                                <p><strong>{{ $itemCart->product->name }}</strong></p>
                                            </a>
                                            <div class="d-flex">
                                                <p>Màu </p>
                                                @if ($itemCart->productColor)
                                                    <label
                                                        style="width: 25px; height: 25px; border-radius: 50%; background-color: {{ $itemCart->productColor->color->code }}; margin-left: 10px;"></label>
                                                @else
                                                    <label class="price">Ngẩu nhiên</label>
                                                @endif
                                            </div>
                                            <p>Giá: ${{ $itemCart->product->selling_price }}</p>
                                            <button type="button" wire:loading.attr="disabled"
                                                wire:click="removeItemCart({{ $itemCart->id }})"
                                                class="btn btn-danger btn-sm me-1 mb-2">
                                                <span wire:loading.remove
                                                    wire:target="removeItemCart({{ $itemCart->id }})">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                                <span wire:loading wire:target="removeItemCart({{ $itemCart->id }})">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                            </button>
                                        </div>

                                        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">

                                            <div class="d-flex mb-4" style="max-width: 300px">

                                                <button class="btn btn-danger px-3" wire:loading.attr="disabled"
                                                    wire:click="decrementQuantity({{ $itemCart->id }})"><i
                                                        class="fa fa-minus"></i></button>
                                                <input type="text" value="{{ $itemCart->quantity }}"
                                                    class="text-center"
                                                    style="width: 150px; border: none; outline: none; background-color: hsl(0, 1%, 74%)" />
                                                <button class="btn btn-danger px-3" wire:loading.attr="disabled"
                                                    wire:click="incrementQuantity({{ $itemCart->id }})"><i
                                                        class="fa fa-plus"></i></button>
                                            </div>
                                            <p class="text-start text-md-center">
                                                Tổng tiền: <strong>
                                                    ${{ $itemCart->product->selling_price * $itemCart->quantity }}
                                                    @php
                                                        $totalPrice += $itemCart->product->selling_price * $itemCart->quantity;
                                                    @endphp
                                                </strong>
                                            </p>
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                @endif
                            @empty
                                <div>
                                    Không có sản phẩm được thêm
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Tổng tiền</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Tiền sản phẩm
                                    <span>${{ $totalPrice }}</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Vận chuyển
                                    <span>$25</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Thuế
                                    <span>$10</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Thành tiền</strong>
                                        <strong>
                                            <p class="mb-0">(Đã bao gồm VAT)</p>
                                        </strong>
                                    </div>
                                    <span><strong>${{ $totalPrice + 10 + 25 }}</strong></span>
                                </li>
                            </ul>

                            <a href="{{ url('/checkout') }}" class="btn btn-danger btn-lg btn-block"> Đi đến thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
