@extends('layouts.user.master-layout')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Sản phẩm của tôi</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('user.home') }}">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Sản phẩm</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Product Start -->
            <div class="col-md-12">
                <div class="row pb-3">
                    @foreach ($listProduct as $product)
                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1" data-id="{{ $product->id }}">
                            <div class="card product-item border-0 mb-4">
                                <div
                                    class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    @php
                                        $pathImage = !empty($product->images->first()->path)
                                            ? Storage::url($product->images->first()->path)
                                            : asset(AVT_URL['DEFAULT']);
                                    @endphp
                                    <img class="img-fluid w-100 h-100" src="{{ $pathImage }}" alt="{{ $product->name }}">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                                    <h5 class="text-truncate mb-3">{{ $product->title }}</h5>
                                    <div class="d-flex justify-content-center">
                                        @if (!empty($product->price_current))
                                            <h6 class="text-muted mr-2"><del>{{ $product->price_original }}</del></h6>
                                            <h6>{{ $product->price_current }}</h6>
                                            <h6 class="ml-1">{{ __('content.common.currency_unit') }}</h6>
                                        @else
                                            <h6>{{ $product->price_original }}</h6>
                                            <h6 class="ml-1">{{ __('content.common.currency_unit') }}</h6>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center bg-light border">
                                    <a href="{{ route('user.product-detail-page', ['id' => $product->id]) }}" class="btn btn-sm text-dark p-0"><i
                                            class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $listProduct->links('layouts.user.pagination') }}
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
@endsection
