@extends('layouts.admin.master-layout')
@push('style') 
    <!-- Custom form product detail css -->
    <link rel="stylesheet" href="{{ asset('css/admin/product/create-detail.css') }}">  
@endpush
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header justify-content-between">
                <h3 class="fw-bold mb-3">Thêm chi tiết</h3>
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
                        <a href="{{ route('admin.product.index') }}">Quản lý sản phẩm</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.product.create') }}">Thêm mới</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Thêm chi tiết</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Thêm chi tiết sản phẩm</div>
                        </div>
                        <form id="create-product-details-form" action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="color_id">Màu sắc</label>
                                            <span class="text-danger">*</span>
                                            <select class="form-select" id="color_id[0]" name="color_id[]">
                                                <option value="" hidden selected hidden>Chọn màu sắc</option>
                                                @foreach ($colors as $color)
                                                    <option value="{{ $color->id }}"
                                                        {{ $color->id == old('color_id.0') ? 'selected' : '' }}>
                                                        {{ $color->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('color_id.0'))
                                                <span class="text-danger">
                                                    {{ $errors->first('color_id.0') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="storage_id">Dung lượng</label>
                                            <span class="text-danger">*</span>
                                            <select class="form-select" id="storage_id" name="storage_id[]">
                                                <option value="" hidden selected hidden>Chọn dung lượng</option>
                                                @foreach ($storages as $storage)
                                                    <option value="{{ $storage->id }}"
                                                        {{ $storage->id == old('storage_id') ? 'selected' : '' }}>
                                                        {{ $storage->storage }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('storage_id.0'))
                                                <span class="text-danger">
                                                    {{ $errors->first('storage_id.0') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="imei">Mã imei:</label>
                                            <span class="text-danger">*</span>
                                            <input type="number" class="form-control" name="imei[]" id="imei">
                                            @if ($errors->has('imei.0'))
                                                <span class="text-danger">
                                                    {{ $errors->first('imei.0') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="qty">Số lượng</label>
                                            <span class="text-danger">*</span>
                                            <input type="number" class="form-control" name="qty[]" id="qty">
                                            @if ($errors->has('qty.0'))
                                                <span class="text-danger">
                                                    {{ $errors->first('qty.0') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="price">Giá</label>
                                            <span class="text-danger">*</span>
                                            <input type="number" class="form-control" name="price[]" id="price">
                                            @if ($errors->has('price.0'))
                                                <span class="text-danger">
                                                    {{ $errors->first('price.0') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="btn btn-xxl add-product-detail-js">
                                            <i class="fa-solid fa-circle-plus"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="upload__box">
                                                <div class="upload__btn-box">
                                                    <label class="upload__btn">
                                                        <p class="text-white mb-0">Add images</p>
                                                        <input id="product-images" type="file" multiple="" data-max_length="20" class="upload__inputfile" name="product_images[]">
                                                    </label>
                                                    </div>
                                                    <div class="upload__img-wrap"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-primary">{{ __('content.common.button.add') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        const colors = @json( $colors );
        const storages = @json( $storages );
        const errors = @json( $errors );
    </script>
    <script src="{{ asset('js/admin/product/create-product-detail.js') }}"></script>
@endpush
