@extends('layouts.user.master-layout')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Thay đổi mật khẩu</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('user.home') }}">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0"><a href="{{ route('user.info.index') }}">Thông tin cá nhân</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Thay đổi mật khẩu</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <form id="edit-password-form" action="{{ route('user.info.update-password') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row px-xl-5">
                <div class="col-lg-5">
                    <h4 class="font-weight-semi-bold form-group d-flex">
                        <label for="password" class="w-50">Mật khẩu: </label>
                        <input class="form-control" type="password" name="password" id="password">
                    </h4>
                    <h4 class="font-weight-semi-bold form-group d-flex">
                        <label for="new_password" class="w-50">Mật khẩu mới: </label>
                        <input class="form-control" type="password" name="new_password" id="new_password">
                    </h4>
                    <h4 class="font-weight-semi-bold form-group d-flex">
                        <label for="new_password_confirmation" class="w-50">Xác nhận mật khẩu: </label>
                        <input class="form-control" type="password" name="new_password_confirmation" id="new_password_confirmation">
                    </h4>
                </div>
            </div>
            <div class="row px-xl-5">
                <div class="col-lg-4 d-flex">
                    <a href="{{ route('user.info.index') }}" class="btn btn-danger w-50 mr-4">Hủy</a>
                    <button type="submit" class="btn btn-primary w-50">Thay đổi</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Shop Detail End -->
    @push('scripts')
        <script src="{{ asset('js/user/edit-password.js') }}"></script>
    @endpush
@endsection
