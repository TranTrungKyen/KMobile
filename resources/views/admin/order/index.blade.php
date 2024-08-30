@extends('layouts.admin.master-layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <div class="col-6">
                    <h3 class="fw-bold">Quản lý đơn hàng</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Đơn hàng</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="line-pending-tab" data-bs-toggle="pill"
                                        href="#line-pending" role="tab" aria-controls="pills-pending"
                                        aria-selected="true">Chờ xác nhận</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="line-shipping-tab" data-bs-toggle="pill" href="#line-shipping"
                                        role="tab" aria-controls="pills-shipping" aria-selected="false">Đang giao</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="line-completed-tab" data-bs-toggle="pill" href="#line-completed"
                                        role="tab" aria-controls="pills-completed" aria-selected="false">Hoàn thành</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="line-canceled-tab" data-bs-toggle="pill" href="#line-canceled"
                                        role="tab" aria-controls="pills-canceled" aria-selected="false">Đã hủy</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-3 mb-3" id="line-tabContent">
                                <div class="tab-pane fade show active" id="line-pending" role="tabpanel"
                                    aria-labelledby="line-pending-tab">
                                    <div class="table-responsive">
                                        <table id="basic-datatables-1" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Mã</th>
                                                    <th>Người nhận</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Tình trạng</th>
                                                    <th>Ngày đặt hàng</th>
                                                    <th>Cập nhật đơn</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Mã</th>
                                                    <th>Người nhận</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Tình trạng</th>
                                                    <th>Ngày đặt hàng</th>
                                                    <th>Cập nhật đơn</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @php
                                                    $isEmpty = true;
                                                @endphp
                                                @foreach ($orders as $index => $item)
                                                    @php
                                                        $isEmpty = false;
                                                    @endphp
                                                    @if ($item->status == ORDER_STATUS[0])
                                                        <tr data-id="{{ $item->id }}">
                                                            <td>{{ $item->id }}</td>
                                                            <td>{{ $item->user_name }}</td>
                                                            <td>{{ $item->phone }}</td>
                                                            <td class="price-js--vi" data-amount="{{ $item->total_price }}">
                                                                {{ $item->total_price }}</td>
                                                            <td>{{ __('content.common.order_status')[$item->status] }}</td>
                                                            <td>{{ $item->created_at }}</td>
                                                            <td>{{ $item->updated_at }}</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a class="btn shadow-none"
                                                                        href="{{ route('admin.order.detail', ['id' => $item->id]) }}">
                                                                        <i class="fa-solid fa-eye" data-bs-toggle="tooltip" 
                                                                        data-bs-placement="bottom" title="Chi tiết đơn hàng"></i>
                                                                    </a>
                                                                    <button class="btn shadow-none" data-bs-toggle="modal" onclick="showFormStatus(event, '{{ ORDER_CANCELED }}')"
                                                                        data-bs-target="#exampleModal" data-name="{{ $item->id }}"
                                                                        data-route="{{ route('admin.order.cancel-status', ['id' => $item->id]) }}">
                                                                        <i class="fa-solid fa-xmark"  
                                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hủy đơn hàng"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                @if ($isEmpty)
                                                    <tr>
                                                        <td colspan="100%" class="text-center">Không có bản ghi</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="line-shipping" role="tabpanel"
                                    aria-labelledby="line-shipping-tab">
                                    <div class="table-responsive">
                                        <table id="basic-datatables-2" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Mã</th>
                                                    <th>Người nhận</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Tình trạng</th>
                                                    <th>Ngày đặt hàng</th>
                                                    <th>Cập nhật đơn</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Mã</th>
                                                    <th>Người nhận</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Tình trạng</th>
                                                    <th>Ngày đặt hàng</th>
                                                    <th>Cập nhật đơn</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @php
                                                    $isEmpty = true;
                                                @endphp
                                                @foreach ($orders as $index => $item)
                                                    @if ($item->status == ORDER_STATUS[1])
                                                        @php
                                                            $isEmpty = false;
                                                        @endphp
                                                        <tr data-id="{{ $item->id }}">
                                                            <td>{{ $item->id }}</td>
                                                            <td>{{ $item->user_name }}</td>
                                                            <td>{{ $item->phone }}</td>
                                                            <td class="price-js--vi"
                                                                data-amount="{{ $item->total_price }}">
                                                                {{ $item->total_price }}</td>
                                                            <td>{{ __('content.common.order_status')[$item->status] }}</td>
                                                            <td>{{ $item->created_at }}</td>
                                                            <td>{{ $item->updated_at }}</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a class="btn shadow-none" data-bs-toggle="tooltip" 
                                                                    data-bs-placement="bottom" title="Chi tiết đơn hàng"
                                                                        href="{{ route('admin.order.detail-other', ['id' => $item->id]) }}">
                                                                        <i class="fa-solid fa-eye"></i>
                                                                        </a>
                                                                        <button class="btn shadow-none" data-bs-toggle="modal" onclick="showFormStatus(event, '{{ ORDER_STATUS[1] }}')"
                                                                            data-bs-target="#exampleModal" data-name="{{ $item->id }}"
                                                                            data-route="{{ route('admin.order.complete-status', ['id' => $item->id]) }}">
                                                                            <i class="fa-solid fa-circle-check" 
                                                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Xác nhận hoàn thành"></i>
                                                                        </button>
                                                                    <button class="btn shadow-none" data-bs-toggle="modal" onclick="showFormStatus(event, '{{ ORDER_CANCELED }}')"
                                                                        data-bs-target="#exampleModal" data-name="{{ $item->id }}"
                                                                        data-route="{{ route('admin.order.cancel-status', ['id' => $item->id]) }}">
                                                                        <i class="fa-solid fa-xmark"  
                                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hủy đơn hàng"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                @if ($isEmpty)
                                                    <tr>
                                                        <td colspan="100%" class="text-center">Không có bản ghi</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="line-completed" role="tabpanel"
                                    aria-labelledby="line-completed-tab">
                                    <div class="table-responsive">
                                        <table id="basic-datatables-3" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Mã</th>
                                                    <th>Người nhận</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Tình trạng</th>
                                                    <th>Ngày đặt hàng</th>
                                                    <th>Cập nhật đơn</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Mã</th>
                                                    <th>Người nhận</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Tình trạng</th>
                                                    <th>Ngày đặt hàng</th>
                                                    <th>Cập nhật đơn</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @php
                                                    $isEmpty = true;
                                                @endphp
                                                @foreach ($orders as $index => $item)
                                                    @if ($item->status == ORDER_STATUS[2])
                                                        @php
                                                            $isEmpty = false;
                                                        @endphp
                                                        <tr data-id="{{ $item->id }}">
                                                            <td>{{ $item->id }}</td>
                                                            <td>{{ $item->user_name }}</td>
                                                            <td>{{ $item->phone }}</td>
                                                            <td class="price-js--vi"
                                                                data-amount="{{ $item->total_price }}">
                                                                {{ $item->total_price }}</td>
                                                            <td>{{ __('content.common.order_status')[$item->status] }}</td>
                                                            <td>{{ $item->created_at }}</td>
                                                            <td>{{ $item->updated_at }}</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a class="btn shadow-none" data-bs-toggle="tooltip" 
                                                                    data-bs-placement="bottom" title="Chi tiết đơn hàng"
                                                                        href="{{ route('admin.order.detail-other', ['id' => $item->id]) }}">
                                                                        <i class="fa-solid fa-eye"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                @if ($isEmpty)
                                                    <tr>
                                                        <td colspan="100%" class="text-center">Không có bản ghi</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="line-canceled" role="tabpanel"
                                    aria-labelledby="line-canceled-tab">
                                    <div class="table-responsive">
                                        <table id="basic-datatables-4" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Mã</th>
                                                    <th>Người nhận</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Tình trạng</th>
                                                    <th>Ngày đặt hàng</th>
                                                    <th>Cập nhật đơn</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Mã</th>
                                                    <th>Người nhận</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Tình trạng</th>
                                                    <th>Ngày đặt hàng</th>
                                                    <th>Cập nhật đơn</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @php
                                                    $isEmpty = true;
                                                @endphp
                                                @foreach ($orders as $index => $item)
                                                    @if ($item->status == ORDER_CANCELED)
                                                        @php
                                                            $isEmpty = false;
                                                        @endphp
                                                        <tr data-id="{{ $item->id }}">
                                                            <td>{{ $item->id }}</td>
                                                            <td>{{ $item->user_name }}</td>
                                                            <td>{{ $item->phone }}</td>
                                                            <td class="price-js--vi"
                                                                data-amount="{{ $item->total_price }}">
                                                                {{ $item->total_price }}</td>
                                                            <td>{{ __('content.common.order_status')[$item->status] }}</td>
                                                            <td>{{ $item->created_at }}</td>
                                                            <td>{{ $item->updated_at }}</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a class="btn shadow-none" data-bs-toggle="tooltip" 
                                                                    data-bs-placement="bottom" title="Chi tiết đơn hàng"
                                                                        href="{{ route('admin.order.detail-other', ['id' => $item->id]) }}">
                                                                        <i class="fa-solid fa-eye"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                @if ($isEmpty)
                                                    <tr>
                                                        <td colspan="100%" class="text-center">Không có bản ghi</td>
                                                    </tr>
                                                @endif
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
        <!-- Modal -->
        <div id="container-modal">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
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
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/admin/order/list-order.js') }}"></script>
@endpush
