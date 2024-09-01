@extends('layouts.admin.master-layout')
@push('style')
    <link href="{{ asset('css/admin/sale/create.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header justify-content-between">
                <h3 class="fw-bold mb-3">Chi tiết</h3>
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
                        <a href="#">Chi tiết</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Chi tiết khuyến mại</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="start_at">Ngày bắt đầu: {{ $sale->start_at }}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="end_at">Ngày kết thúc: {{ $sale->end_at }}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="description">Mô tả ngắn: {{ $sale->description }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Sản phẩm khuyến mại</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="basic-datatables"
                                                    class="display table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>STT</th>
                                                            <th>Sản phẩm</th>
                                                            <th>Giảm giá(%)</th>
                                                            <th>Giá khuyến mại</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>STT</th>
                                                            <th>Sản phẩm</th>
                                                            <th>Giảm giá(%)</th>
                                                            <th>Giá khuyến mại</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @foreach ($sale->productDetailSale as $index => $item)
                                                            <tr data-id="{{ $item->id }}">
                                                                <td>{{ ++$index }}</td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-4 d-flex align-items-center">
                                                                            @php
                                                                                $srcImage = $item->productDetail
                                                                                    ->product->image
                                                                                    ? Storage::url(
                                                                                        $item->productDetail->product
                                                                                            ->image,
                                                                                    )
                                                                                    : asset(AVT_URL['DEFAULT']);
                                                                                $name =
                                                                                    $item->productDetail->product->name;
                                                                                $price = $item->productDetail->price;
                                                                                $color =
                                                                                    $item->productDetail->color->name;
                                                                                $storage =
                                                                                    $item->productDetail->storage
                                                                                        ->storage;
                                                                            @endphp
                                                                            <img src="{{ $srcImage }}"
                                                                                class="img-fluid rounded-start pe-3 pt-2 pb-2 product-image"
                                                                                alt="{{ $name }}">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="card-body p-0">
                                                                                <h5 class="card-title fs-6">
                                                                                    {{ $name }}</h5>
                                                                                <p class="card-text mb-0">
                                                                                    <small class="text-muted">Màu sắc:
                                                                                        {{ $color }}</small>
                                                                                </p>
                                                                                <p class="card-text mb-0">
                                                                                    <small class="text-muted">Dung lượng:
                                                                                        {{ $storage }}</small>
                                                                                </p>
                                                                                <p class="card-text">
                                                                                <div class="text-muted d-flex">
                                                                                    <small>Giá gốc: </small>
                                                                                    <small class="ms-2 price-js--vi"
                                                                                        data-amount="{{ $price }}">
                                                                                        {{ $price }}
                                                                                    </small>
                                                                                </div>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>{{ $item->discount }}</td>
                                                                <td class="price-js--vi" data-amount="{{ $item->price }}">{{ $item->price }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{-- Custorm js --}}
    <script src="{{ asset('js/admin/sale/detail.js') }}"></script>
@endpush
