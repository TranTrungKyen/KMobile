@extends('layouts.user.master-layout')
@section('content')
    <!-- Order detail Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                            @foreach ($order->orderDetails as $item)
                                <tr>
                                    <td class="align-middle">
                                        <div class="d-flex justify-content-around">
                                            <div class="product-img">
                                                <img src="{{ Storage::url($item->productDetail->product->image) }}"
                                                    alt="{{ $item->productDetail->product->name }}" style="width: 50px;">
                                            </div>
                                            <div class="d-flex flex-column">
                                                <div class="product-name">
                                                    {{ $item->productDetail->product->name }}
                                                </div>
                                                <div class="product-detail d-flex">
                                                    <div class="product-detail--color mr-2">
                                                        Màu sắc: {{ $item->productDetail->color->name }}
                                                    </div>
                                                    <div class="product-detail--storage">
                                                        Dung lượng: {{ $item->productDetail->storage->storage }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle price-js--vi" data-amount="{{ $item->price }}">
                                        {{ $item->price }}</td>
                                    <td class="align-middle">
                                        {{ $item->qty }}
                                    </td>
                                    <td class="align-middle price-js--vi"
                                        data-amount="{{ $item->total_price }}">{{ $item->total_price }}</td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Thông tin đơn hàng</h4>
                    </div>
                    @if (!auth()->check())
                        <p class="mb-0 p-3 text-center">Vui lòng đăng nhập để xem chi tiết đơn hàng</p>
                        <a class="btn btn-primary text-center" href="{{ route('user.login') }}">Đăng nhập</a>
                    @else
                            <div class="card-body">
                                <div class="mb-3">
                                    Mã đơn hàng: {{ $order->id ?? '' }}
                                </div>
                                <div class="mb-3">
                                    Họ tên: {{ $order->user_name ?? '' }}
                                </div>
                                <div class="mb-3">
                                    Địa chỉ nhận: {{ $order->address ?? '' }}
                                </div>
                                <div class="mb-3">
                                    Số điện thoại: {{ $order->phone ?? '' }}
                                </div>
                                <div class="mb-3">
                                    Địa chỉ email: {{ $order->email ?? '' }}
                                </div>
                                <div class="mb-3">
                                    Tình trạng: 
                                    <span class="{{ $order->status != ORDER_CANCELED ? 'text-success' : 'text-danger' }}">
                                        {{ __('content.common.order_status')[$order->status] }}
                                    </span>
                                </div>
                                <div class="mb-3">
                                    Ghi chú: {{ $order->note ?? 'Không có' }}
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5 class="font-weight-bold">Tổng hóa đơn</h5>
                                    <h5 class="font-weight-bold price-js--vi"
                                        data-amount="{{ $order->total_price }}">
                                        {{ $order->total_price }}</h5>
                                </div>
                                @if ($order->status == ORDER_STATUS[1])
                                    <form action="{{ route('user.order.complete-status', ['id' => $order->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <button id="complete-submit-btn" class="btn btn-block btn-primary my-3 py-3">Đã nhận</button>
                                    </form>
                                @endif
                                @if ($order->status == ORDER_STATUS[0])
                                    <button class="btn btn-danger btn-block shadow-none my-3 py-3" data-toggle="modal" data-target="#exampleModal"
                                        onclick="showFormStatus(event, '{{ ORDER_CANCELED }}')" data-name="{{ $order->id }}"
                                        data-route="{{ route('user.order.cancel-status', ['id' => $order->id]) }}">
                                        Hủy đơn
                                    </button>
                                @endif
                            </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Order detail End -->
    <!-- Modal -->
    <div id="container-modal">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                          </button>
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
    <script src="{{ asset('js/user/order-detail.js') }}"></script>
@endpush
