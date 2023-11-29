@extends('layouts.app')

@section('title', 'Search Page')

@section('content')

    <div class="container h-100 mt-5">
        <h4 style="text-align: center;" class="mb-3">Kết quả tìm kiếm cho {{ $search }}</h4>

        {{-- @forelse ($searchProducts as $product)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($product->quantity > 0)
                                    <label class="stock bg-success">In Stock</label>
                                @else
                                    <label class="stock bg-danger">Out Stock</label>
                                @endif
                                @if ($product->productImages()->count() > 0)
                                    <a href="{{ url('/collections/' . $product->category->slug . '/' . $product->slug) }}">
                                        <img src="{{ asset($product->productImages[0]->image) }}"
                                            alt="{{ $product->name }}">
                                    </a>
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $product->brand }}</p>
                                <h5 class="product-name">
                                    <a href="{{ url('/collections/' . $product->category->slug . '/' . $product->slug) }}">
                                        {{ $product->name }}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">{{ $product->selling_price }}</span>
                                    <span class="original-price">{{ $product->original_price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Product Found</h4>
                        </div>
                    </div>
                @endforelse --}}
        {{-- <div class="row">
                    {{ $searchProducts->appends(request()->input())->links() }}
                </div> --}}
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">
                @forelse ($searchProducts as $product)
                    <div class="row justify-content-center mb-3">
                        <div class="col-md-12 col-xl-10">
                            <div class="card shadow-0 border rounded-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                            <div class="bg-image">
                                                @if ($product->productImages()->count() > 0)
                                                    <a
                                                        href="{{ url('/collections/' . $product->category->name . '/' . $product->name) }}">
                                                        <img src="{{ asset($product->productImages[0]->image) }}"
                                                            alt="{{ $product->name }}">
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-xl-6">

                                            <h5>
                                                <a
                                                    href="{{ url('/collections/' . $product->category->name . '/' . $product->name) }}">
                                                    {{ $product->name }}
                                                </a>
                                            </h5>
                                            <p class="mb-4 mb-md-0">
                                                {{ $product->description }}
                                            </p>
                                        </div>
                                        <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                            <div class="d-flex flex-row align-items-center mb-1">
                                                <h4 class="mb-1 me-1">$ {{ $product->selling_price }}</h4>
                                                <span class="text-danger"><s>$ {{ $product->original_price }}</s></span>
                                            </div>
                                            <h6 class="text-capitalize">Color</h6>
                                            <div>
                                                @if ($product->productColors)
                                                    @foreach ($product->productColors as $colorItem)
                                                        <label class="colorSelectionLabel"
                                                            style="width: 30px;height: 30px;border-radius: 50%;background-color: {{ $colorItem->color->code }}"
                                                            wire:click="colorSelected({{ $colorItem->id }})">
                                                        </label>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="d-flex flex-column mt-4">
                                                <a href="{{ url('/collections/' . $product->category->name . '/' . $product->name) }}" class="btn btn-primary btn-sm" type="button">Thông Tin Sản
                                                    Phẩm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="row justify-content-center mb-3">
                        <div class="col-md-12 col-xl-10">
                            <div class="card shadow-0 border rounded-3">
                                <div class="card-body">
                                    <h4>No Product Found</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            {{ $searchProducts->appends(request()->input())->links() }}
        </div>
    </div>


@endsection
