@extends('layouts.user.master-layout')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Tin tức</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('user.home') }}">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Tin tức</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- News Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop News Start -->
            <div class="col-md-12">
                <div class="row pb-3">
                    {{-- @if ($listProduct->isEmpty()) --}}
                    {{-- <div class="d-flex justify-content-center w-100 pb-4 font-weight-bold">
                        Không có tin tức nào
                    </div> --}}
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                @php
                                    $pathImage = asset('img/carousel-1.jpg');
                                @endphp
                                <img class="img-fluid w-100 h-100" src="{{ $pathImage }}" alt="....">
                            </div>
                            <div class="card-body border-left border-right text-left">
                                <h5 class="text-truncate mb-3">Tiêu đề</h5>
                                <p class="text-muted">27-08-2024</p>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus, nemo ut similique debitis enim quae voluptas animi obcaecati accusantium mollitia inventore nihil sit ducimus, sunt voluptate quas dolorem dolores rem!</p>
                            </div>
                            <div class="card-footer d-flex justify-content-center bg-light border">
                                <a href="{{ route('user.news.detail') }}" class="btn btn-sm text-dark p-0"><i
                                        class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                @php
                                    $pathImage = asset('img/carousel-2.jpg');
                                @endphp
                                <img class="img-fluid w-100 h-100" src="{{ $pathImage }}" alt="....">
                            </div>
                            <div class="card-body border-left border-right text-left">
                                <h5 class="text-truncate mb-3">Tiêu đề</h5>
                                <p class="text-muted">27-08-2024</p>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus, nemo ut similique debitis enim quae voluptas animi obcaecati accusantium mollitia inventore nihil sit ducimus, sunt voluptate quas dolorem dolores rem!</p>
                            </div>
                            <div class="card-footer d-flex justify-content-center bg-light border">
                                <a href="{{ route('user.news.detail') }}" class="btn btn-sm text-dark p-0"><i
                                        class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                @php
                                    $pathImage = asset('img/carousel-1.jpg');
                                @endphp
                                <img class="img-fluid w-100 h-100" src="{{ $pathImage }}" alt="....">
                            </div>
                            <div class="card-body border-left border-right text-left">
                                <h5 class="text-truncate mb-3">Tiêu đề</h5>
                                <p class="text-muted">27-08-2024</p>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus, nemo ut similique debitis enim quae voluptas animi obcaecati accusantium mollitia inventore nihil sit ducimus, sunt voluptate quas dolorem dolores rem!</p>
                            </div>
                            <div class="card-footer d-flex justify-content-center bg-light border">
                                <a href="{{ route('user.news.detail') }}" class="btn btn-sm text-dark p-0"><i
                                        class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                @php
                                    $pathImage = asset('img/carousel-2.jpg');
                                @endphp
                                <img class="img-fluid w-100 h-100" src="{{ $pathImage }}" alt="....">
                            </div>
                            <div class="card-body border-left border-right text-left">
                                <h5 class="text-truncate mb-3">Tiêu đề</h5>
                                <p class="text-muted">27-08-2024</p>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus, nemo ut similique debitis enim quae voluptas animi obcaecati accusantium mollitia inventore nihil sit ducimus, sunt voluptate quas dolorem dolores rem!</p>
                            </div>
                            <div class="card-footer d-flex justify-content-center bg-light border">
                                <a href="{{ route('user.news.detail') }}" class="btn btn-sm text-dark p-0"><i
                                        class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                            </div>
                        </div>
                    </div>
                    {{-- @endif --}}
                    {{-- @foreach ($listProduct as $product)
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
                    @endforeach --}}
                    {{-- {{ $listProduct->links('layouts.user.pagination') }} --}}
                </div>
            </div>
            <!-- Shop News End -->
        </div>
    </div>
    <!-- News End -->
@endsection
