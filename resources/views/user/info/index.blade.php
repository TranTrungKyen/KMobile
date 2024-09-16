@extends('layouts.user.master-layout')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Thông tin cá nhân</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('user.home') }}">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Thông tin cá nhân</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-4 pb-5">
                <img class="w-100 h-100 mh-448" src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}">
            </div>

            <div class="col-lg-5 pb-5">
                <h3 class="font-weight-normal">Họ tên: {{ $user->name }}</h3>
                <h3 class="font-weight-normal mt-4">Email: {{ $user->email }}</h3>
                <h3 class="font-weight-normal mt-4">Số điện thoại: {{ $user->phone }}</h3>
                <h3 class="font-weight-normal mt-4">Địa chỉ: {{ $user->address }}</h3>
                <h3 class="font-weight-normal mt-4">Giới tính: {{ __('content.common.gender')[($user->gender) ? 'male' : 'female']  }}</h3>
                <p class="description line-clamp-4 mt-4">
                    Giới thiệu bản thân: {{ $user->description }}
                </p>
            </div>

            <div class="col-lg-3 pb-5">
                <a href="{{ route('user.info.edit') }}" class="btn btn-primary w-100">Cập nhật thông tin</a>
                <a href="{{ route('user.info.edit-password') }}" class="btn btn-primary w-100 mt-4">Thay đổi mật khẩu</a>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->
@endsection
