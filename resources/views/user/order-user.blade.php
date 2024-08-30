@extends('layouts.user.master-layout')
@section('content')
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-start border-secondary mb-2">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Chờ xác nhận</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Đang giao</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Hoàn thành</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-4">Đã hủy</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <div class="col-lg-12 table-responsive mb-5 max-vh-55 p-0">
                            <table class="table table-bordered text-center mb-0">
                                <thead class="bg-secondary text-dark">
                                    <tr>
                                        <th>Mã</th>
                                        <th>Người nhận</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ nhận</th>
                                        <th>Tổng tiền</th>
                                        <th>Tình trạng</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    @php
                                        $pendingRecords = $orders->filter(
                                            fn($item) => $item->status === ORDER_STATUS[0],
                                        );
                                    @endphp

                                    @if ($pendingRecords->isEmpty())
                                        <tr>
                                            <td colspan="8">
                                                Đơn hàng chờ xác nhận trống
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($pendingRecords as $item)
                                            <tr data-id="{{ $item->id }}">
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->user_name }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td class="price-js--vi" data-amount="{{ $item->total_price }}">
                                                    {{ $item->total_price }}</td>
                                                <td>{{ __('content.common.order_status')[$item->status] }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-around">
                                                        <a class="btn shadow-none" data-bs-toggle="tooltip"
                                                            data-bs-placement="bottom" title="Chi tiết đơn hàng"
                                                            href="{{ route('user.order.detail', ['id' => $item->id]) }}">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <div class="col-lg-12 table-responsive mb-5 max-vh-55 p-0">
                            <table class="table table-bordered text-center mb-0">
                                <thead class="bg-secondary text-dark">
                                    <tr>
                                        <th>Mã</th>
                                        <th>Người nhận</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ nhận</th>
                                        <th>Tổng tiền</th>
                                        <th>Tình trạng</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    @php
                                        $shippingRecords = $orders->filter(
                                            fn($item) => $item->status === ORDER_STATUS[1],
                                        );
                                    @endphp

                                    @if ($shippingRecords->isEmpty())
                                        <tr>
                                            <td colspan="8">
                                                Đơn hàng đang giao trống
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($shippingRecords as $item)
                                            <tr data-id="{{ $item->id }}">
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->user_name }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td class="price-js--vi" data-amount="{{ $item->total_price }}">
                                                    {{ $item->total_price }}</td>
                                                <td>{{ __('content.common.order_status')[$item->status] }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-around">
                                                        <a class="btn shadow-none" data-bs-toggle="tooltip"
                                                            data-bs-placement="bottom" title="Chi tiết đơn hàng"
                                                            href="{{ route('user.order.detail', ['id' => $item->id]) }}">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="col-lg-12 table-responsive mb-5 max-vh-55 p-0">
                            <table class="table table-bordered text-center mb-0">
                                <thead class="bg-secondary text-dark">
                                    <tr>
                                        <th>Mã</th>
                                        <th>Người nhận</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ nhận</th>
                                        <th>Tổng tiền</th>
                                        <th>Tình trạng</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    @php
                                        $completedRecords = $orders->filter(
                                            fn($item) => $item->status === ORDER_STATUS[2],
                                        );
                                    @endphp

                                    @if ($completedRecords->isEmpty())
                                        <tr>
                                            <td colspan="8">
                                                Đơn hàng đã hoàn thành trống
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($completedRecords as $item)
                                            <tr data-id="{{ $item->id }}">
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->user_name }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td class="price-js--vi" data-amount="{{ $item->total_price }}">
                                                    {{ $item->total_price }}</td>
                                                <td>{{ __('content.common.order_status')[$item->status] }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-around">
                                                        <a class="btn shadow-none" data-bs-toggle="tooltip"
                                                            data-bs-placement="bottom" title="Chi tiết đơn hàng"
                                                            href="{{ route('user.order.detail', ['id' => $item->id]) }}">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-4">
                        <div class="col-lg-12 table-responsive mb-5 max-vh-55 p-0">
                            <table class="table table-bordered text-center mb-0">
                                <thead class="bg-secondary text-dark">
                                    <tr>
                                        <th>Mã</th>
                                        <th>Người nhận</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ nhận</th>
                                        <th>Tổng tiền</th>
                                        <th>Tình trạng</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    @php
                                        $canceledRecords = $orders->filter(
                                            fn($item) => $item->status === ORDER_CANCELED,
                                        );
                                    @endphp

                                    @if ($canceledRecords->isEmpty())
                                        <tr>
                                            <td colspan="8">
                                                Đơn hàng đã hủy trống
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($canceledRecords as $item)
                                            <tr data-id="{{ $item->id }}">
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->user_name }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td class="price-js--vi" data-amount="{{ $item->total_price }}">
                                                    {{ $item->total_price }}</td>
                                                <td>{{ __('content.common.order_status')[$item->status] }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-around">
                                                        <a class="btn shadow-none" data-bs-toggle="tooltip"
                                                            data-bs-placement="bottom" title="Chi tiết đơn hàng"
                                                            href="{{ route('user.order.detail', ['id' => $item->id]) }}">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
