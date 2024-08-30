@extends('layouts.admin.master-layout')
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
                        <a href="{{ route('admin.product.index') }}">Quản lý sản phẩm</a>
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
                            <div class="card-title">Chi tiết sản phẩm</div>
                        </div>
                        <div class="card-body">
                            <div class="info-product">
                                <div class="row">
                                    <div class="col-md-2">
                                        <p>
                                            Tên sản phẩm:
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p>
                                            {{ $product->name }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <p>
                                            Tiêu đề:
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p>
                                            {{ $product->title }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <p>
                                            Hãng:
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p>
                                            {{ $product->brand->name }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <p>
                                            Danh mục:
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p>
                                            {{ $product->category->name }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <p>
                                            Mô tả:
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="description line-clamp-4">
                                            {{ $product->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="list-images">
                                <div class="container">
                                    <p class="card-title mb-2">Ảnh sản phẩm</p>
                                    <div class="row row-cols-4 row-cols-md-6 g-4">
                                        @foreach ($product->images as $item)
                                            <div class="col">
                                                <img src="{{ Storage::url($item->path) }}" class="img-fluid" alt="Image {{ $item->id }}">
                                            </div>
                                        @endforeach
                                        @if(count($product->images) == 0)
                                            <p> Chưa có ảnh nào </p>
                                        @endif
                                    </div>
                                  </div>
                            </div>
                            <div class="product-details mt-4">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Loại sản phẩm</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="basic-datatables" class="display table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Màu sắc</th>
                                                        <th>Dung lượng</th>
                                                        <th>Imei</th>
                                                        <th>Số lượng còn</th>
                                                        <th>Giá</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Màu sắc</th>
                                                        <th>Dung lượng</th>
                                                        <th>Imei</th>
                                                        <th>Số lượng còn</th>
                                                        <th>Giá</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    @foreach ($product->productDetails as $index => $item)
                                                        <tr>
                                                            <td>{{ ++$index }}</td>
                                                            <td>{{ $item->color->name }}</td>
                                                            <td>{{ $item->storage->storage }}</td>
                                                            <td>{{ $item->imeis->sortByDesc('updated_at')->first()->imei ?? 'Không có' }}</td>
                                                            <td>{{ $item->qty }}</td>
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
@endsection
@push('scripts')
    <script src="{{ asset('js/admin/product/detail.js') }}"></script>
@endpush
