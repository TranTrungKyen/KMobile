@extends('layouts.user.master-layout')
@section('content')
    <!-- Page Header Start -->
    {{-- <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Giỏ hàng</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('user.home') }}">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Giỏ hàng</p>
            </div>
        </div>
    </div> --}}
    <!-- Page Header End -->

    <!-- Cart Start -->
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
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @if ($cartItems->count() < 1)
                            <tr>
                                <td colspan="5">
                                    Giỏ hàng trống
                                </td>
                            </tr>
                        @else
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td class="align-middle">
                                        <div class="d-flex justify-content-around">
                                            <div class="product-img">
                                                <img src="{{ Storage::url($item->model->product->image) }}"
                                                    alt="{{ $item->name }}" style="width: 50px;">
                                            </div>
                                            <div class="d-flex flex-column">
                                                <div class="product-name">
                                                    {{ $item->name }}
                                                </div>
                                                <div class="product-detail d-flex">
                                                    <div class="product-detail--color mr-2">
                                                        Màu sắc: {{ $item->model->color->name }}
                                                    </div>
                                                    <div class="product-detail--storage">
                                                        Dung lượng: {{ $item->model->storage->storage }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle price-js--vi" data-amount="{{ $item->price }}">
                                        {{ $item->price }}</td>
                                    <td class="align-middle">
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-minus stop-prevent-default-js--click">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text"
                                                class="form-control form-control-sm bg-secondary text-center update-qty-js stop-prevent-default-js--keydown"
                                                data-row-id="{{ $item->rowId }}" data-product-detail-id="{{ $item->id }}"
                                                value="{{ $item->qty }}">
                                            <div class="input-group-btn">
                                                <button
                                                    class="btn btn-sm btn-primary btn-plus stop-prevent-default-js--click">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle price-js--vi"
                                        data-amount="{{ $item->Subtotal(false, '', '') }}">{{ $item->Subtotal() }}</td>
                                    <td class="align-middle"><button data-row-id="{{ $item->rowId }}"
                                            class="btn btn-sm btn-primary stop-prevent-default-js--click delete-item-js"><i
                                                class="fa fa-times"></i></button></td>
                                </tr>
                            @endforeach
                            <tr>
                                <th colspan="5" class="text-right price-js--vi"
                                    data-amount="{{ $cart->Subtotal(false, '', '') }}">
                                    Tổng hóa đơn: {{ $cart->Subtotal() }}
                                </th>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="float-right mt-3 btn btn-primary clear-items-js">
                    Xóa tất cả
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Tóm tắt giỏ hàng</h4>
                    </div>
                    <form action="#" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">Tổng hóa đơn</h6>
                                <h6 class="font-weight-medium">$150</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">$10</h6>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Tổng hóa đơn</h5>
                                <h5 class="font-weight-bold price-js--vi"
                                    data-amount="{{ $cart->subtotal(false, '', '') }}">
                                    {{ $cart->subtotal(false, '', '') }}</h5>
                            </div>
                            <button class="btn btn-block btn-primary my-3 py-3">Đặt hàng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
    <form id="update-cart-form" action="{{ route('user.cart.update') }}" method="post">
        @csrf
        @method('put')
        <input type="hidden" id="rowId" name="rowId">
        <input type="hidden" id="product_detail_id" name="product_detail_id">
        <input type="hidden" id="qty" name="qty">
    </form>
    <form id="delete-item-cart-form" action="{{ route('user.cart.delete') }}" method="post">
        @csrf
        @method('delete')
        <input type="hidden" id="rowD_Id" name="rowId">
    </form>
    <form id="clear-cart-form" action="{{ route('user.cart.clear') }}" method="post">
        @csrf
        @method('delete')
    </form>
@endsection
@push('scripts')
    <script src="{{ asset('js/user/cart.js') }}"></script>
@endpush
