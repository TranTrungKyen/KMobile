@extends('layouts.admin.master-layout')
@push('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet" />
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
                        </div>
                        <form id="create-sale-form" action="#" method="post" enctype="multipart/form-data">
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
                                        <ul class="list-group list-group-flush rounded shadow-sm overflow-hidden">
                                            <p class="h5 px-3 py-2 mb-0 bg-light">Danh sách sản phẩm chọn</p>
                                            <li class="list-group-item">
                                                <div class="card shadow-none mb-3">
                                                    <div class="row g-0">
                                                        <div class="col-md-4 d-flex align-items-center">
                                                            <img src="{{ asset(AVT_URL['DEFAULT']) }}"
                                                                class="img-fluid rounded-start p-2" alt="...">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="card-body p-0">
                                                                <h5 class="card-title fs-6">Card title</h5>
                                                                <p class="card-text mb-0">
                                                                    <small class="text-muted">Màu sắc: Vàng</small>
                                                                </p>
                                                                <p class="card-text mb-0">
                                                                    <small class="text-muted">Dung lượng: 32GB</small>
                                                                </p>
                                                                <p class="card-text">
                                                                    <small class="text-muted">
                                                                        Giá: 1000000 VNĐ
                                                                    </small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-md-2 d-flex align-items-center justify-content-center">
                                                            <div class="btn p-0 fs-3 shadow-none">
                                                                <i class="fa-solid fa-circle-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="card shadow-none mb-3">
                                                    <div class="row g-0">
                                                        <div class="col-md-4 d-flex align-items-center">
                                                            <img src="{{ asset(AVT_URL['DEFAULT']) }}"
                                                                class="img-fluid rounded-start p-2" alt="...">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="card-body p-0">
                                                                <h5 class="card-title fs-6">Card title</h5>
                                                                <p class="card-text mb-0">
                                                                    <small class="text-muted">Màu sắc: Vàng</small>
                                                                </p>
                                                                <p class="card-text mb-0">
                                                                    <small class="text-muted">Dung lượng: 32GB</small>
                                                                </p>
                                                                <p class="card-text">
                                                                    <small class="text-muted">
                                                                        Giá: 1000000 VNĐ
                                                                    </small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-md-2 d-flex align-items-center justify-content-center">
                                                            <div class="btn p-0 fs-3 shadow-none">
                                                                <i class="fa-solid fa-circle-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="card shadow-none mb-3">
                                                    <div class="row g-0">
                                                        <div class="col-md-4 d-flex align-items-center">
                                                            <img src="{{ asset(AVT_URL['DEFAULT']) }}"
                                                                class="img-fluid rounded-start p-2" alt="...">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="card-body p-0">
                                                                <h5 class="card-title fs-6">Card title</h5>
                                                                <p class="card-text mb-0">
                                                                    <small class="text-muted">Màu sắc: Vàng</small>
                                                                </p>
                                                                <p class="card-text mb-0">
                                                                    <small class="text-muted">Dung lượng: 32GB</small>
                                                                </p>
                                                                <p class="card-text">
                                                                    <small class="text-muted">
                                                                        Giá: 1000000 VNĐ
                                                                    </small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-md-2 d-flex align-items-center justify-content-center">
                                                            <div class="btn p-0 fs-3 shadow-none">
                                                                <i class="fa-solid fa-circle-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-8">
                                        <ul class="list-group list-group-flush rounded shadow-sm overflow-hidden">
                                            <p class="h5 px-3 py-2 mb-0 bg-light">Sản phẩm đã chọn</p>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="card shadow-none mb-3">
                                                            <div class="row g-0">
                                                                <div class="col-md-4 d-flex align-items-center">
                                                                    <img src="{{ asset(AVT_URL['DEFAULT']) }}"
                                                                        class="img-fluid rounded-start p-2"
                                                                        alt="...">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="card-body p-0">
                                                                        <h5 class="card-title fs-6">Card title</h5>
                                                                        <p class="card-text mb-0">
                                                                            <small class="text-muted">Màu sắc: Vàng</small>
                                                                        </p>
                                                                        <p class="card-text mb-0">
                                                                            <small class="text-muted">Dung lượng:
                                                                                32GB</small>
                                                                        </p>
                                                                        <p class="card-text">
                                                                            <small class="text-muted">
                                                                                Giá: 1000000 VNĐ
                                                                            </small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <div class="row mt-4">
                                                                    <div class="col-md-12">
                                                                        <div data-mdb-input-init class="form-outline">
                                                                            <input min="0" max="100" type="number" name="discount"
                                                                                id="discount" class="form-control" />
                                                                            <label class="form-label" for="discount">Giảm
                                                                                giá (%)</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 text-center">
                                                                        <p class="text-muted mb-0">hoặc</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div data-mdb-input-init class="form-outline">
                                                                            <input min="0" type="number" name="price"
                                                                                id="price" class="form-control" />
                                                                            <label class="form-label" for="price">Giá cuối ({{ __('content.common.currency_unit') }})
                                                                                </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-2 d-flex align-items-center justify-content-center">
                                                                <div class="btn p-0 fs-3 shadow-none shadow-none">
                                                                    <i class="fa-solid fa-circle-xmark"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
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
@push('scripts')
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"></script>
@endpush
