@extends('layouts.app')

@section('title', 'My Order Details')

@section('content')

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            <i class="fa fa-shopping text-dark"></i>Chi tiết đơn hàng
                            <a href="{{ url('orders') }}" class="btn btn-danger btn-sm float-end">Back</a>
                        </h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Order Detail</h5>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <td>Order ID</td>
                                                <td># {{ $order->id }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tracking ID/No.</td>
                                                <td>{{ $order->tracking_no }}</td>
                                            </tr>
                                            <tr>
                                                <td>Order Create Date</td>
                                                <td>{{ $order->created_at->format('d-m-Y h:i A') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Payment Mode</td>
                                                <td>{{ $order->payment_mode }}</td>
                                            </tr>
                                            <tr>
                                                <td>Order Status Message</td>
                                                <td style="text-transform: uppercase" class="text-success fw-bold">{{ $order->status_message }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>User Detail</h5>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <td>Fullname</td>
                                                <td>{{ $order->fullname }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{ $order->email }}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td>{{ $order->phone }}</td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td>{{ $order->address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Pin Code</td>
                                                <td>{{ $order->pincode }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h5>Order Items</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>Item ID</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Color</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </thead>
                                <tbody>
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @forelse ($order->orderItems as $orderItem)
                                        <tr>
                                            <td>{{ $orderItem->id }}</td>
                                            <td>
                                                @if ($orderItem->product->productImages)
                                                    <img src="{{ asset($orderItem->product->productImages[0]->image) }}"
                                                        style="width: 50px; height: 50px" alt="">
                                                @endif
                                            </td>
                                            <td>{{ $orderItem->product->name }}</td>
                                            <td>
                                            @if ($orderItem->productColor)
                                                <label class="price"
                                                    style="width: 30px; height: 30px; border-radius: 50%; background-color: {{ $orderItem->productColor->color->code }}"></label>
                                            @else
                                                <label class="price">No Color</label>
                                            @endif
                                            </td>
                                            <td>{{ $orderItem->price }}</td>
                                            <td>{{ $orderItem->quantity }}</td>
                                            <td class="fw-bold">{{ $orderItem->quantity * $orderItem->price }}</td>
                                            @php
                                                $totalPrice += $orderItem->price * $orderItem->quantity
                                            @endphp
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No Orders Available</td>
                                        </tr>
                                    @endforelse
                                    <tr>
                                        <td colspan="6" class="fw-bold">Total Amount :</td>
                                        <td colspan="1" class="fw-bold">{{ $totalPrice }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
