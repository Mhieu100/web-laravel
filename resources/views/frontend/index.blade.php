@extends('layouts.app')

@section('title', 'Home page')

@section('content')

    <div class="container mt-3">
        <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
            <div class="carousel-inner">
                @foreach ($sliders as $key => $slider)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ asset("$slider->image") }}" class="d-block w-100" alt="...">
                        {{-- <div class="carousel-caption d-none d-md-block">
                            <h5>{!! $slider->title !!}</h5>
                            <p>{!! $slider->description !!}</p>
                        </div> --}}
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample"
                data-mdb-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample"
                data-mdb-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

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
            <h4 class="card-title text-center mb-3"><strong>Sản Phẩm Bán Chạy</strong></h4>
            <div class="container py-3">
                <div class="row">
                    <div class="owl-carousel owl-theme four-product">
                        @foreach ($trendingProducts as $product)
                            <div class="item">
                                <div class="card">
                                    @if ($product->productImages()->count() > 0)
                                        <a
                                            href="{{ url('/collections/' . $product->category->name . '/' . $product->name) }}">
                                            <img src="{{ asset($product->productImages[0]->image) }}" class="card-img-top"
                                                alt="{{ $product->name }}" />
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
                                        <h6 class="mt-2">
                                            <a
                                                href="{{ url('/collections/' . $product->category->name . '/' . $product->name) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h6>
                                        <div class="d-flex justify-content-between">
                                            <p class="small text-danger"><s>$ {{ $product->original_price }}</s></p>
                                            <h5 class="text-dark mb-0">$ {{ $product->selling_price }}</h5>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                             <button class="btn btn-primary">Thông Tin Sản Phẩm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container card mt-4" style="background-color: rgb(220, 219, 219);">
        <div class="card-body">
            <h4 class="card-title text-center mb-3"><strong>Sản Phẩm Mới Nhất</strong></h4>
            <div class="container py-3">
                <div class="row">
                    <div class="owl-carousel owl-theme four-product">
                        @foreach ($newArrivalProducts as $product)
                            <div class="item">
                                <div class="card">
                                    @if ($product->productImages()->count() > 0)
                                        <a
                                            href="{{ url('/collections/' . $product->category->name . '/' . $product->name) }}">
                                            <img src="{{ asset($product->productImages[0]->image) }}" class="card-img-top"
                                                alt="{{ $product->name }}" />
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
                                        <h6 class="mb-0">
                                            <a
                                                href="{{ url('/collections/' . $product->category->name . '/' . $product->name) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h6>
                                        <div class="d-flex justify-content-between">

                                            <p class="small text-danger"><s>$ {{ $product->original_price }}</s></p>
                                            <h5 class="text-dark mb-0">$ {{ $product->selling_price }}</h5>
                                        </div>
                                         <div class="d-flex justify-content-center">
                                             <button class="btn btn-primary">Thông Tin Sản Phẩm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container card mt-4" style="background-color: rgb(220, 219, 219);">
        <div class="card-body">
            <h4 class="card-title text-center mb-3"><strong>Sản Phẩm Nổi Bật</strong></h4>
            <div class="container py-3">
                <div class="row">
                    <div class="owl-carousel owl-theme four-product">
                        @foreach ($featuredProducts as $product)
                            <div class="item">
                                <div class="card">
                                    @if ($product->productImages()->count() > 0)
                                        <a
                                            href="{{ url('/collections/' . $product->category->name . '/' . $product->name) }}">
                                            <img src="{{ asset($product->productImages[0]->image) }}" class="card-img-top"
                                                alt="{{ $product->name }}" />
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
                                        <h6 class="mb-0">
                                            <a
                                                href="{{ url('/collections/' . $product->category->name . '/' . $product->name) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h6>
                                        <div class="d-flex justify-content-between">
                                            <p class="small text-danger"><s>$ {{ $product->original_price }}</s></p>
                                            <h5 class="text-dark mb-0">$ {{ $product->selling_price }}</h5>
                                        </div>
                                         <div class="d-flex justify-content-center">
                                             <button class="btn btn-primary">Thông Tin Sản Phẩm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
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
            autoplay: true,
            nav: true,
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
