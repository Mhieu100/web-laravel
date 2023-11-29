<div>

    <section class="h-100 h-custom">
        <div class="container h-100 mt-3">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card shopping-cart" style="border-radius: 15px;">
                        <div class="card-body text-black">

                            @if ($this->totalProductAmount != '0')
                                <div class="row">
                                    <div class="col-lg-6 px-5 py-4">

                                        <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Sản phẩm của bạn</h3>

                                        @foreach ($cart as $itemCart)
                                            <div class="d-flex align-items-center mb-4">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ asset($itemCart->product->productImages[0]->image) }}"
                                                        class="img-fluid" style="width: 150px;"
                                                        alt="{{ $itemCart->product->name }}">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h5 class="text-primary">{{ $itemCart->product->name }}</h5>
                                                    <div class="d-flex">
                                                        <h6 style="color: rgb(131, 131, 131);">Màu :
                                                            @if ($itemCart->productColor)
                                                                <label
                                                                    style="width: 15px; height: 15px; border-radius: 50%; background-color: {{ $itemCart->productColor->color->code }}; margin-left: 5px"></label>
                                                            @else
                                                                <label class="price">Ngẩu nhiên</label>
                                                            @endif
                                                    </div>

                                                    </h6>
                                                    <h6 style="color: rgb(131, 131, 131);">Giá :
                                                        ${{ $itemCart->product->selling_price }}</h6>
                                                    <h6>Tổng :
                                                        ${{ $itemCart->product->selling_price * $itemCart->quantity }}
                                                    </h6>
                                                </div>
                                            </div>
                                        @endforeach

                                        <hr class="mb-4" style="height: 2px; background-color: #1266f1; opacity: 1;">

                                        <div class="d-flex justify-content-between p-2 mb-2"
                                            style="background-color: #e1f5fe;">
                                            <h5 class="fw-bold mb-0">Tổng tiền:</h5>
                                            <h5 class="fw-bold mb-0">${{ $totalProductAmount }}</h5>
                                        </div>
                                        <hr>
                                        <small>* Hàng sẽ về sau 3 - 5 ngày.</small>
                                        <br />
                                        <small>* Đã bao gồm thuế và các chi phí khác ?</small>

                                    </div>
                                    <div class="col-lg-6 px-5 py-4">

                                        <h3 class="mb-4 pt-2 text-center fw-bold text-uppercase">Thông tin của bạn</h3>

                                        <form action="" method="POST" class="mb-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="fullname">Họ Tên</label>
                                                <input type="text" wire:model.defer.defer="fullname" id="fullname"
                                                    class="form-control" placeholder="Enter Full Name" readonly />

                                                @error('fullname')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="email">Email</label>
                                                <input type="email" wire:model.defer="email" id="email"
                                                    class="form-control" placeholder="Enter Email Address" readonly />

                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="mb-2">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="phone">Số điện thoại</label>
                                                        <input type="number" wire:model.defer="phone" id="phone"
                                                            class="form-control" placeholder="Enter Phone Number"/>

                                                        @error('phone')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="pincode">Pin-Code
                                                            (Zip-Code)</label>
                                                        <input type="number" wire:model.defer="pincode" id="pincode"
                                                            class="form-control" placeholder="Enter Pin-code"/>

                                                        @error('pincode')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="form-label" for="address">Địa chỉ</label>
                                            <textarea wire:model.defer="address" id="address" class="form-control" rows="2"></textarea>

                                            @error('address')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror

                                            <div class="row mt-3" wire:ignore>
                                                <h5>Phương thức thanh toán :</h5>
                                                <div class="col-3">
                                                    <div class="nav flex-column nav-pills text-center" id="v-pills-tab"
                                                        role="tablist" aria-orientation="vertical">
                                                        <a wire:loading.attr="disabled" class="nav-link active"
                                                            id="v-pills-home-tab" data-mdb-toggle="pill"
                                                            href="#v-pills-home" role="tab"
                                                            aria-controls="v-pills-home" aria-selected="true">COD</a>
                                                        <a class="nav-link" wire:loading.attr="disabled"
                                                            class="nav-link" id="v-pills-profile-tab"
                                                            data-mdb-toggle="pill" href="#v-pills-profile"
                                                            role="tab" aria-controls="v-pills-profile"
                                                            aria-selected="false">Online</a>
                                                    </div>
                                                </div>

                                                <div class="col-9">
                                                    <div class="tab-content col-md-9" id="v-pills-tabContent">
                                                        <div class="tab-pane fade show active" id="v-pills-home"
                                                            role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                            <h6>Phương thức thanh toán khi nhận hàng</h6>
                                                            <hr />
                                                            <button wire:loading.attr="disabled" type="button"
                                                                wire:click="codOrder" class="btn btn-primary">
                                                                <span wire:target="codOrder" wire:loading.remove>
                                                                    Đặt hàng ( thanh toán khi nhận hàng )
                                                                </span>
                                                                <span wire:target="codOrder" wire:loading>
                                                                     Đặt hàng ...
                                                                </span>
                                                            </button>

                                                        </div>
                                                        <div class="tab-pane fade" id="v-pills-profile"
                                                            role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                            <h6>Thanh toán online</h6>
                                                            <hr />
                                                            <div>
                                                                <div id="paypal-button-container"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <div class="card card-body shadow text-center mt-4 mb-4">
                                    <h3 class="mt-3 mb-4">Không có sản phẩm nào trong giỏ để thành toán</h3>
                                    <a href="{{ url('/home') }}" class="btn btn-danger">Shoping Now</a>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@push('scripts')
    <script
        src="https://www.paypal.com/sdk/js?client-id=ATg0vhbpWEcsO-mJfyj3j9tGbMOed981iD5s9XHTwHvU2k5V4bggLEI8DI671nC8zgL6et6xzG2QHpcZ&currency=USD">
    </script>

    <script>
        paypal.Buttons({
            // onClick is called when the button is clicked
            onClick: function() {

                // Show a validation error if the checkbox is not checked
                if (!document.getElementById('fullname').value ||
                    !document.getElementById('phone').value ||
                    !document.getElementById('pincode').value ||
                    !document.getElementById('address').value ||
                    !document.getElementById('email').value
                ) {
                    Livewire.emit('validationForAll');
                    return false;
                } else {
                    @this.set('fullname', document.getElementById('fullname').value);
                    @this.set('phone', document.getElementById('phone').value);
                    @this.set('pincode', document.getElementById('pincode').value);
                    @this.set('address', document.getElementById('address').value);
                    @this.set('email', document.getElementById('email').value);
                }
            },
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '0.1' // Can also reference a variable or function
                        }
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    const transaction = orderData.purchase_units[0].payments.captures[0];
                    if (transaction.status == "COMPLETED") {
                        Livewire.emit('transactionEmit', transaction.id);
                    }
                    // alert(
                    //     `Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`
                    //     );
                });
            }
        }).render('#paypal-button-container');
    </script>
@endpush
