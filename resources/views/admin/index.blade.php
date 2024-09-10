@extends('layouts.admin.master-layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h1 class="ms-2">Tổng quan</h1>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Khách hàng</p>
                                        <h4 class="card-title">{{ $customers->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-info bubble-shadow-small">
                                        <i class="fas fa-user-check"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Nhân viên</p>
                                        <h4 class="card-title">{{ $employees->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-success bubble-shadow-small">
                                        <i class="fas fa-luggage-cart"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Doanh thu trong năm</p> 
                                        <h4 class="card-title price-js--vi" data-amount="{{ $totalRevenue }}">
                                            {{ $totalRevenue }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                        <i class="far fa-check-circle"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Đơn hàng trong năm</p>
                                        <h4 class="card-title">{{ $orders->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title d-flex align-items-end justify-content-between">
                                Khách hàng mới
                                <a class="float-end fs-6 link-primary mb-1" href="{{ route('admin.user.index') }}">Xem thêm</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-head-bg-success">
                                <thead>
                                    <tr>
                                        <th scope="col">Ảnh</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Địa chỉ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers->slice(0, 5) as $customer)
                                    <tr>
                                        <td>
                                            <div class="avatar avatar-xl">
                                                <img src="{{ $customer->avatar ? Storage::url($customer->avatar) : asset(AVT_URL['DEFAULT']) }}"
                                                    alt="{{ $customer->name }} picture"
                                                    class="avatar-img rounded-circle">
                                            </div>
                                        </td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->address }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title d-flex align-items-end justify-content-between">
                                Đơn hàng mới
                                <a class="float-end fs-6 link-primary mb-1" href="{{ route('admin.order.index') }}">Xem thêm</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive table-head-bg-primary">
                                <thead>
                                    <tr>
                                        <th scope="col">Mã</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Ngày đặt hàng</th>
                                        <th scope="col">Tổng tiền</th>
                                        <th scope="col">Tình trạng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->slice(0, 5) as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user_name }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td class="price-js--vi" data-amount="{{ $order->total_price }}">{{ $order->total_price }}</td>
                                        <td>
                                            <p class="{{ $order->status != ORDER_CANCELED ? 'text-success' : 'text-danger' }}">
                                                {{ __('content.common.order_status')[$order->status] }}
                                            </p>
                                        </td>
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
@endsection
