@extends('layouts.user.master-layout')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">KMobile Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0">Trang chủ</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Categories Start -->
    <div class="container-fluid">
        <div class="row px-xl-5 pb-3">
            @foreach ($brands->slice(0,6) as $brand)
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                        <p class="text-right">{{ $brand->products_count }} sản phẩm</p>
                        <a href="{{ route('user.product.brand', ['id' => $brand->id]) }}" class="cat-img position-relative overflow-hidden mb-3 text-center">
                            @php
                                $pathImage = !empty($brand->path) ? Storage::url($brand->path) : asset(AVT_URL['DEFAULT']);
                            @endphp
                            <img class="img-fluid" src="{{ $pathImage }}" alt="{{ $brand->name }}">
                        </a>
                        <h5 class="font-weight-semi-bold m-0">{{ $brand->name }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Categories End -->


    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5 background-smartphone">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">{{ $categories[0]->products_count }} sản phẩm</h5>
                        <h1 class="mb-4 font-weight-semi-bold text-primary">{{ $categories[0]->name }}</h1>
                        <a href="{{ route('user.product.category', ['id' => $categories[0]->id]) }}" class="btn btn-outline-primary py-md-2 px-md-3">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5 background-tablet">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">{{ $categories[1]->products_count }} sản phẩm</h5>
                        <h1 class="mb-4 font-weight-semi-bold text-primary">{{ $categories[1]->name }}</h1>
                        <a href="{{ route('user.product.category', ['id' => $categories[1]->id]) }}" class="btn btn-outline-primary py-md-2 px-md-3">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm hot</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @if ($products->isEmpty())
                <div class="d-flex justify-content-center w-100 pb-4 font-weight-bold">
                    Không có sản phẩm nào
                </div>
            @endif
            @foreach ($products->slice(0,8) as $product)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1" data-id="{{ $product->id }}">
                    <div class="card product-item border-0 mb-4">
                        <div
                            class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            @php
                                $pathImage = !empty($product->image) ? Storage::url($product->image) : asset(AVT_URL['DEFAULT']);
                            @endphp
                            <img class="img-fluid w-100 h-100" src="{{ $pathImage }}" alt="{{ $product->name }}">
                        </div>
                        <div class="card-body border-left border-right text-left">
                            <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                            <h5 class="text-truncate mb-3">{{ $product->title }}</h5>
                            <div class="d-flex justify-content-between">
                                @if (!empty($product->price_current))
                                    <h6 class="text-muted mr-2"><del class="price-js--vi" data-amount="{{ $product->price_original }}">{{ $product->price_original }}</del></h6>
                                    <h6 class="font-weight-bold price-js--vi" data-amount="{{ $product->price_current }}">{{ $product->price_current }}</h6>
                                @else
                                    <h6 class="font-weight-bold price-js--vi" data-amount="{{ $product->price_original }}">{{ $product->price_original }}</h6>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-center bg-light border">
                            <a href="{{ route('user.product.detail', ['id' => $product->id]) }}" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-12 text-center">
                <a href="{{ route('user.product.index') }}" class="btn btn-outline-primary py-md-2 px-md-3">Xem thêm</a>
            </div>
        </div>
    </div>
    <!-- Products End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel h-100">
                    @foreach ($brands as $brand)
                        <div class="vendor-item border p-4 h-166" data-id="{{ $brand->id }}">
                            <a href="{{ route('user.product.brand', ['id' => $brand->id]) }}">
                                @php
                                    $pathImage = !empty($brand->path) ? Storage::url($brand->path) : asset(AVT_URL['DEFAULT']);
                                @endphp
                                <img class="h-100" src="{{ $pathImage }}" alt="{{ $brand->name }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
@endsection
