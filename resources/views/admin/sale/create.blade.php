@extends('layouts.admin.master-layout')
@push('style')
    <link href="{{ asset('css/admin/sale/create.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header justify-content-between">
                <h3 class="fw-bold mb-3">Thêm mới</h3>
                <ul class="breadcrumbs mb-3 float-end">
                    <li class="nav-home">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.sale.index') }}">Quản lý khuyến mại</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Thêm mới</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Thêm mới khuyến mại</div>
                            <div class="row">
                                <form class="col-md-4" id="find-product-detail-form" action="{{ route('admin.sale.find') }}" method="GET" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Tìm kiếm tên sản phẩm">
                                            <button type="submit" class="input-icon-addon border-0 btn bg-transparent">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <form id="create-sale-form" action="{{ route('admin.sale.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="start_at">Ngày bắt đầu</label>
                                            <span class="text-danger">*</span>
                                            <input class="form-control input-date-js" type="date" id="start_at"
                                                name="start_at" placeholder="Nhập ngày bắt đầu"
                                                value="{{ old('start_at') }}">
                                            @if ($errors->has('start_at'))
                                                <span class="text-danger">
                                                    {{ $errors->first('start_at') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="end_at">Ngày kết thúc</label>
                                            <span class="text-danger">*</span>
                                            <input class="form-control input-date-js" type="date" id="end_at"
                                                name="end_at" placeholder="Nhập ngày kết thúc" value="{{ old('end_at') }}">
                                            @if ($errors->has('end_at'))
                                                <span class="text-danger">
                                                    {{ $errors->first('end_at') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="description">Mô tả ngắn</label>
                                            <span class="text-danger">*</span>
                                            <input type="text" placeholder="Nhập mô tả ngắn" name="description"
                                                id="description" class="form-control">
                                            @if ($errors->has('description'))
                                                <span class="text-danger">
                                                    {{ $errors->first('description') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <p class="h5 px-3 py-2 mb-0 bg-light shadow-sm rounded-top">Danh sách sản phẩm chọn</p>
                                        <ul id="list-product" class="list-group list-group-flush rounded shadow-sm scrollbar-inner">
                                            @foreach ($productDetails as $item)
                                                <li class="list-group-item">
                                                    <div class="card shadow-none mb-3">
                                                        <div class="row g-0">
                                                            <div class="col-md-4 d-flex align-items-center">
                                                                @php
                                                                    $productImage = !empty($item->product->image)
                                                                        ? Storage::url($item->product->image)
                                                                        : asset(AVT_URL['DEFAULT']);
                                                                    $dataProduct = [
                                                                        'product_detail_id' => $item->id,
                                                                        'image' => $productImage,
                                                                        'name' => $item->product->name,
                                                                        'color' => $item->color->name,
                                                                        'storage' => $item->storage->storage,
                                                                        'price' => $item->price,
                                                                    ];
                                                                @endphp
                                                                <img src="{{ $productImage }}"
                                                                    class="img-fluid rounded-start pe-3 pt-2 pb-2 product-image"
                                                                    alt="{{ $item->product->name }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="card-body p-0">
                                                                    <h5 class="card-title fs-6">{{ $item->product->name }}
                                                                    </h5>
                                                                    <p class="card-text mb-0">
                                                                        <small class="text-muted">Màu sắc:
                                                                            {{ $item->color->name }}</small>
                                                                    </p>
                                                                    <p class="card-text mb-0">
                                                                        <small class="text-muted">Dung lượng:
                                                                            {{ $item->storage->storage }}</small>
                                                                    </p>
                                                                    <p class="card-text">
                                                                        <div class="text-muted d-flex">
                                                                            <small>Giá: </small>
                                                                            <small class="ms-2 price-js--vi" data-amount="{{ $item->price }}">
                                                                                {{ $item->price }}
                                                                            </small>
                                                                        </div>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-md-2 d-flex align-items-center justify-content-center">
                                                                <div class="btn p-0 fs-3 shadow-none add-product-sale-js"
                                                                    data-add-product-btn-id="{{ $item->id }}"
                                                                    data-product="{{ collect($dataProduct) }}">
                                                                    <i class="fa-solid fa-circle-plus"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="h5 px-3 py-2 mb-0 bg-light shadow-sm rounded-top">Sản phẩm đã chọn</p>
                                        <ul id="list-product-sale-selected"
                                            class="list-group list-group-flush rounded shadow-sm scrollbar-inner">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-primary">{{ __('content.common.button.add') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{-- Custorm js --}}
    <script>
        const errors = @json($errors);
        const STORAGE_URL = @json(Storage::url(''));
    </script>
    <script src="{{ asset('js/admin/sale/create.js') }}"></script>
@endpush
