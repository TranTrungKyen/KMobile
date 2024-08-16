@extends('layouts.admin.master-layout')
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
                        <a href="{{ route('admin.product.index') }}">Quản lý sản phẩm</a>
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
                            <div class="card-title">Thêm mới sản phẩm</div>
                        </div>
                        <form id="create-product-form" action="{{ route('admin.product.store-product') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Tên sản phẩm</label>
                                            <span class="text-danger">*</span>
                                            <input class="form-control" type="text" id="name" name="name"
                                                placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">
                                                    {{ $errors->first('name') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Tiêu đề</label>
                                            <span class="text-danger">*</span>
                                            <input class="form-control" type="text" id="title" name="title"
                                                placeholder="Nhập tiêu đề" value="{{ old('title') }}">
                                            @if ($errors->has('title'))
                                                <span class="text-danger">
                                                    {{ $errors->first('title') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="brand_id">Hãng</label>
                                            <span class="text-danger">*</span>
                                            <select class="form-select" id="brand_id" name="brand_id">
                                                <option value="" hidden selected disabled>Chọn hãng</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}"
                                                        {{ $brand->id == old('brand_id') ? 'selected' : '' }}>
                                                        {{ $brand->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('brand_id'))
                                                <span class="text-danger">
                                                    {{ $errors->first('brand_id') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category_id">Danh mục</label>
                                            <span class="text-danger">*</span>
                                            <select class="form-select" id="category_id" name="category_id">
                                                <option value="" hidden selected disabled>Chọn danh mục</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == old('category_id') ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('category_id'))
                                                <span class="text-danger">
                                                    {{ $errors->first('category_id') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Mô tả</label>
                                            <span class="text-danger">*</span>
                                            <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                                            @if ($errors->has('description'))
                                                <span class="text-danger">
                                                    {{ $errors->first('description') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-primary">{{ __('content.common.button.next') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
