@extends('layouts.app')

@section('title', 'Shop Page')

@section('content')

    <div class="container card mt-4" style="background-color: rgb(220, 219, 219);">
        <div class="card-body">
            <h4 class="card-title text-center mb-3"><strong>Danh Mục Sản Phẩm</strong></h4>
            <div class="row">

                <div class="owl-carousel owl-theme four-product">
                    @foreach ($categories as $category)
                        <div class="item">
                            <div class="bg-image hover-zoom">
                                <img src="{{ asset("$category->image") }}" class="w-100" />
                                <a href="{{ url('/collections/' . $category->name) }}">
                                    <div class="mask">
                                        <div class="d-flex justify-content-end align-items-start h-100">
                                            <h5><span
                                                    class="badge bg-success pt-2 mx-3 mt-3 text-light">{{ $category->name }}</span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="hover-overlay">
                                        <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container card mt-4" style="background-color: rgb(220, 219, 219);">
        <div class="card-body">
            <h4 class="card-title text-center mb-3"><strong>Tất Cả Sản Phẩm</strong></h4>
            <div class="row">
                @forelse ($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-2 mb-2 mb-lg-0">
                        <div class="card mb-3">
                            @if ($product->productImages()->count() > 0)
                                <a href="{{ url('/collections/' . $product->category->name . '/' . $product->name) }}">
                                    <img src="{{ asset($product->productImages[0]->image) }}" class="card-img-top"
                                        alt="{{ $product->name }}" />
                                    {{-- <div class="mask">
                                        <div class="d-flex justify-content-end align-items-start h-100 p-2">
                                            @if ($product->quantity > 0)
                                                <h5><span class="badge bg-success pt-2 ms-3 text-light">In
                                                        Stock</span>
                                                </h5>
                                            @else
                                                <h5><span class="badge bg-danger pt-2 ms-3 text-light">Out
                                                        Stock</span>
                                                </h5>
                                            @endif
                                        </div>
                                    </div> --}}
                                    <div class="mask">
                                        <div class="d-flex justify-content-end align-items-start h-100">
                                            <h5><span
                                                    class="badge bg-success pt-2 mx-3 mt-3 text-light">{{ $product->brand }}</span>
                                            </h5>
                                        </div>
                                    </div>
                                </a>
                            @endif
                            <div class="card-body">
                                <a href="{{ url('/collections/' . $product->category->name . '/' . $product->name) }}">
                                    <p class="mb-0 small fw-bold" style="font-size: 12px;">{{ $product->name }}</p>
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
                <div class="mt-2">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>
        $('.four-product').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>

@endsection
