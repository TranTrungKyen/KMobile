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
                                    <img class="img-fluid w-100 h-100" src="{{ $pathImage }}" alt="">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                                    <h5 class="text-truncate mb-3">{{ $product->title }}</h5>
                                    <div class="d-flex justify-content-center">
                                        @php
                                            $productSale = $product->productSale->sortByDesc('updated_at')->first();

                                            $isInRange = false;
                                            if ($productSale) {
                                                $current = \Carbon\Carbon::now();
                                                $start = \Carbon\Carbon::parse($productSale->sale->start_at);
                                                $end = \Carbon\Carbon::parse($productSale->sale->end_at);

                                                $isInRange = $current->between($start, $end);
                                            }
                                        @endphp
                                        @if ($isInRange && $productSale)
                                            <h6 class="text-muted mr-2"><del>{{ $product->price }}</del></h6>
                                            <h6>{{ $productSale->price }}</h6>
                                            <h6 class="ml-1">{{ __('content.common.currency_unit') }}</h6>
                                        @else
                                            <h6>{{ $product->price }}</h6>
                                            <h6 class="ml-1">{{ __('content.common.currency_unit') }}</h6>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="#" class="btn btn-sm text-dark p-0"><i
                                            class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                                    <a href="#" class="btn btn-sm text-dark p-0"><i
                                            class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</a>
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
