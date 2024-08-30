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
                        <a href="{{ route('admin.order.index') }}">Quản lý đơn hàng</a>
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
                            <div class="card-title">Chi tiết đơn hàng</div>
                        </div>
                        <div class="card-body">
                            <div class="info-order">
                                <div class="row">
                                    <div class="col-md-2">
                                        <p>
                                            Mã đơn hàng:
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p>
                                            {{ $order->id }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <p>
                                            Người nhận:
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p>
                                            {{ $order->user_name }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <p>
                                            Địa chỉ:
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p>
                                            {{ $order->address }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <p>
                                            Số điện thoại:
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p>
                                            {{ $order->phone }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <p>
                                            Email:
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="description line-clamp-4">
                                            {{ $order->email }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <p>
                                            Tình trạng:
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="{{ $order->status != ORDER_CANCELED ? 'text-success' : 'text-danger' }}">
                                            {{ __('content.common.order_status')[$order->status] }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <p>
                                            Ngày đặt hàng:
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="description line-clamp-4">
                                            {{ $order->created_at }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <p>
                                            Ngày cập nhật:
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="description line-clamp-4">
                                            {{ $order->updated_at }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="order-details mt-4">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Danh sách sản phẩm đặt</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="basic-datatables"
                                                class="display table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Tên sảm phẩm</th>
                                                        <th>Màu sắc</th>
                                                        <th>Dung lượng</th>
                                                        <th>Số lượng</th>
                                                        <th>Giá</th>
                                                        <th>Tổng giá</th>
                                                        @if ($order->status != ORDER_CANCELED)
                                                            <th>Imei</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Tên sảm phẩm</th>
                                                        <th>Màu sắc</th>
                                                        <th>Dung lượng</th>
                                                        <th>Số lượng</th>
                                                        <th>Giá</th>
                                                        <th>Tổng giá</th>
                                                        @if ($order->status != ORDER_CANCELED)
                                                            <th>Imei</th>
                                                        @endif
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    @foreach ($order->orderDetails as $index => $item)
                                                        <tr>
                                                            <td>{{ ++$index }}</td>
                                                            <td>{{ $item->productDetail->product->name }}</td>
                                                            <td>{{ $item->productDetail->color->name }}</td>
                                                            <td>{{ $item->productDetail->storage->storage }}</td>
                                                            <td>{{ $item->qty }}</td>
                                                            <td class="price-js--vi" data-amount="{{ $item->price }}">
                                                                {{ $item->price }}</td>
                                                            <td class="price-js--vi"
                                                                data-amount="{{ $item->total_price }}">
                                                                {{ $item->total_price }}</td>
                                                            @if ($order->status != ORDER_CANCELED)
                                                                <td class="col-md-3">
                                                                    @foreach ($item->imeis as $imeiItem)
                                                                        {{ $imeiItem->imei }}
                                                                    @endforeach
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="float-end">
                                @if ($order->status == ORDER_STATUS[1])
                                    <button class="btn btn-danger shadow-none me-4" data-bs-toggle="modal"
                                        onclick="showFormStatus(event, '{{ ORDER_CANCELED }}')" data-bs-target="#exampleModal"
                                        data-name="{{ $order->id }}"
                                        data-route="{{ route('admin.order.cancel-status', ['id' => $order->id]) }}">
                                        Hủy đơn
                                    </button>
                                    <button class="btn btn-primary shadow-none" data-bs-toggle="modal"
                                        onclick="showFormStatus(event, '{{ ORDER_STATUS[1] }}')" data-bs-target="#exampleModal"
                                        data-name="{{ $order->id }}"
                                        data-route="{{ route('admin.order.complete-status', ['id' => $order->id]) }}">
                                        Hoàn thành
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="container-modal">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#" method="post">
                        @csrf
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Chắc chắn</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/admin/order/detail.js') }}"></script>
@endpush
