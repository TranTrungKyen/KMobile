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
                    {{-- Search --}}
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="#">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search by name">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort by
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Search end --}}
                    @foreach ($listProduct as $product)
                        @if (!$product->productDetails->isEmpty() && $product->active)
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
                        @endif
                    @endforeach
                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center mb-3">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
@endsection
