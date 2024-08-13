@extends('layouts.admin.master-layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header justify-content-between">
                <h3 class="fw-bold mb-3">Chỉnh sửa</h3>
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
                        <a href="{{ route('admin.brand.index') }}">Quản lý hãng</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Chỉnh sửa</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Chỉnh sửa hãng</div>
                        </div>
                        <form id="update-brand-form" action="{{ route('admin.brand.update', ['id' => $brand->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Tên hãng</label>
                                            <span class="text-danger">*</span>
                                            <input class="form-control" type="text" id="name" name="name"
                                                placeholder="Nhập họ tên" value="{{ $brand->name ?? old('name') }}">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">
                                                    {{ $errors->first('name') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="path">Ảnh hãng
                                                {{ !empty($brand->path) ? '(Đã có)' : '' }}</label>
                                            <span class="text-danger">*</span>
                                            <input class="form-control" type="file" id="path" name="path"
                                                accept="image/*">
                                        </div>
                                        @if ($errors->has('path'))
                                            <span class="text-danger">
                                                {{ $errors->first('path') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
