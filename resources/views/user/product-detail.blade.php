@extends('layouts.user.master-layout')
@push('style')
    <link rel="stylesheet" href="{{ asset('css/user/product-detail.css') }}">
@endpush
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Chi tiết sản phẩm</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('user.home') }}">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0"><a href="{{ route('user.product.index') }}">Sản phẩm</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Chi tiết</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    
    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        @foreach ($product->images as $key => $item)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img class="w-100 h-100" src="{{ Storage::url($item->path) }}" alt="Image">
                            </div>
                        @endforeach
                    </div>
                    @if ($product->images->count() > 1)
                        <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                            <i class="fa fa-2x fa-angle-left text-dark"></i>
                        </a>
                        <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                            <i class="fa fa-2x fa-angle-right text-dark"></i>
                        </a>
                    @endif
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h1 class="font-weight-semi-bold">{{ $product->title }}</h1>
                <h3 class="font-weight-semi-bold">{{ $product->name }}</h3>
                <div class="product-detail-price-js">
                    @if (!empty($product->price_current))
                        <h4 class="mb-4 text-muted mr-2"><del class="price-js--vi" data-amount="{{ $product->price_original }}">{{ $product->price_original }}</del></h3>
                        <h3 class="font-weight-semi-bold mb-4 price-js--vi" data-amount="{{ $product->price_current }}">{{ $product->price_current }}</h3>
                    @else
                        <h3 class="font-weight-semi-bold mb-4 price-js--vi" data-amount="{{ $product->price_original }}">{{ $product->price_original }}</h3>
                    @endif
                </div>
                <form id="add-to-cart-form" action="{{ route('user.cart.store') }}" method="post">
                    @csrf
                    {{-- Storage --}}
                    <div class="d-flex mb-3">
                        <div class="input-group mb-3">
                            <label class="input-group-text col-md-2 bg-primary" for="storage">Dung lượng: </label>
                            <select class="form-select col-md-4 border-primary outline-primary" id="storage">
                                <option value="" selected="">Chọn dung lượng</option>
                                @foreach ($product->productDetails->unique('storage_id') as $key => $productDetail)
                                    <option value="{{ $productDetail->storage->id }}">{{ $productDetail->storage->storage }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Storage end --}}
                    {{-- Color --}}
                    <div class="d-flex mb-3">
                        <div class="input-group mb-3">
                            <label class="input-group-text col-md-2 bg-primary" for="color">Màu sắc: </label>
                            <select class="form-select col-md-4 border-primary" disabled="" id="color">
                                <option value="" selected="">Chọn màu sắc</option>
                            </select>
                        </div>
                    </div>
                    {{-- Color end --}}
                    {{-- Qty --}}
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus stop-prevent-default-js--click">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control bg-secondary text-center stop-prevent-default-js--keydown" name="qty" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus stop-prevent-default-js--click">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <input type="text" name="product_detail_id" hidden id="product-detail-id">
                        <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>Thêm vào giỏ hàng</button>

                    </div>
                    {{-- Qty end --}}
                </form>
                <p class="description line-clamp-4">
                    {{ $product->description }}
                </p>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Có thể bạn cũng thích</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach ($listProduct as $item)
                        <div class="card product-item border-0 mb-4" data-product-id="{{ $item->id }}">
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                @php
                                    $pathImage = !empty($item->images->first()->path)
                                        ? Storage::url($item->images->first()->path)
                                        : asset(AVT_URL['DEFAULT']);
                                @endphp
                                <img class="img-fluid w-100 h-100" src="{{ $pathImage }}" alt="{{ $item->name }}">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{ $item->name }}</h6>
                                <h5 class="text-truncate mb-3">{{ $item->title }}</h5>
                                <div class="d-flex justify-content-center">
                                    @if (!empty($item->price_current))
                                        <h6 class="text-muted mr-2"><del class="price-js--vi" data-amount="{{ $item->price_original }}">{{ $item->price_original }}</del></h6>
                                        <h6 class="price-js--vi" data-amount="{{ $item->price_current }}">{{ $item->price_current }}</h6>
                                    @else
                                        <h6 class="price-js--vi" data-amount="{{ $item->price_original }}">{{ $item->price_original }}</h6>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-center bg-light border">
                                <a href="{{ route('user.product.detail', ['id' => $item->id]) }}" class="btn btn-sm text-dark p-0"><i
                                        class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
@endsection
@push('scripts')
    <script>
        const productDetailValues = @json($product->productDetails);
        
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                let message = @json($error);
                toastr.error(message);
            @endforeach
        @endif
    </script>
    <script src="{{ asset('js/user/product-detail.js') }}"></script>
@endpush
