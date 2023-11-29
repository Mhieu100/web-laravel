@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <div class="alert alert-success mb-3">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>
                        <i class="fa fa-shopping text-dark"></i> My Order Details
                        <a href="{{ url('admin/orders') }}" class="btn btn-danger text-white btn-sm float-end ms-2">Back</a>
                        <a href="{{ url('admin/invoice/' . $order->id) }}" target="_blank"
                            class="btn btn-success text-white btn-sm float-end ms-2">View Invoice</a>
                        <a href="{{ url('admin/invoice/' . $order->id . '/generate') }}"
                            class="btn btn-warning text-white btn-sm  ms-2 float-end">Dowwload Invoice</a>
                        {{-- <a href="{{ url('admin/invoice/' . $order->id . '/mail') }}"
                            class="btn btn-primary text-white btn-sm  ms-2 float-end">Send Mail Invoice</a> --}}
                    </h4>
                </div>
                <div class="card-body bg-contents">
                    <div class="shadow bg-white p-3">
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
                                                $totalPrice += $orderItem->price * $orderItem->quantity;
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
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4>Order Process (Order Status Updates)</h4>
                            <hr>
                            <div class="row">
                                <form action="{{ url('admin/orders/' . $order->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <label class="mb-3">Update Your Order Status</label>
                                    <div class="input-group">
                                        <select name="order_status" class="form-select" id="">
                                            <option>Select Order Status</option>
                                            <option value="is progress"
                                                {{ Request::get('status') == 'is progress' ? 'selected' : '' }}>Is Progress
                                            </option>
                                            <option value="completed"
                                                {{ Request::get('status') == 'completed' ? 'selected' : '' }}>Completed
                                            </option>
                                        </select>
                                        <button class="btn btn-primary text-white">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
