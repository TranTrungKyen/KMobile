@extends('layouts.user.master-layout')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Cập nhật thông tin</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('user.home') }}">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0"><a href="{{ route('user.info.index') }}">Thông tin cá nhân</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Cập nhật thông tin</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <form id="edit-user-form" action="{{ route('user.info.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row px-xl-5">
                <div class="col-lg-4 pb-5">
                    @php
                        $avatar = !(empty($user->avatar)) ? Storage::url($user->avatar) : asset(AVT_URL['DEFAULT']);
                    @endphp
                    <img id="avatar-preview" class="w-100 h-100 mh-448" src="{{ $avatar }}" alt="{{ $user->name }}">
                </div>
                <div class="col-lg-5 pb-5">
                    <h4 class="font-weight-semi-bold form-group d-flex">
                        <label id="name" class="w-50">Họ tên: </label>
                        <input class="form-control" type="text" placeholder="Nhập họ tên" id="name" value="{{ $user->name }}" name="name">
                    </h4>
                    <h4 class="font-weight-semi-bold form-group d-flex">
                        <label id="email" class="w-50">Email: </label>
                        <input class="form-control" type="text" placeholder="Nhập email" id="email" value="{{ $user->email }}" name="email">
                    </h4>
                    <h4 class="font-weight-semi-bold form-group d-flex">
                        <label id="phone" class="w-50">Số điện thoại: </label>
                        <input class="form-control" type="text" placeholder="Nhập số điện thoại" id="phone" value="{{ $user->phone }}" name="phone">
                    </h4>
                    <h4 class="font-weight-semi-bold form-group d-flex">
                        <label id="address" class="w-50">Địa chỉ: </label>
                        <input class="form-control" type="text" placeholder="Nhập địa chỉ" id="address" value="{{ $user->address }}" name="address">
                    </h4>
                    <h4 class="form-group d-flex">
                        <label class="font-weight-semi-bold w-50">Giới tính: </label>
                        @foreach (GENDERS as $gender => $value)
                            @php
                                $checked = $user->gender == $value ? 'checked' : '';
                            @endphp
                            <div class="d-block w-50 font-weight-normal">
                                <input class="scale-2 mr-2" type="radio" name="gender"
                                    id="{{ $gender }}" value="{{ $value }}" {{ $checked }}>
                                <label for="{{ $gender }}">
                                    {{ __('content.common.gender')[$gender] }}
                                </label>
                            </div>
                        @endforeach
                    </h4>
                    <div class="input-group mb-3 align-items-center">
                        <h4 class="font-weight-semi-bold mb-0 mr-4">Ảnh đại diện: </h4>
                        <div class="custom-file">
                            <input type="file" name="avatar" class="custom-file-input" id="avatar-file" aria-describedby="inputGroupFileAddon01" accept="image/png, image/jpeg, image/jpg" data-old="{{ $user->avatar }}">
                            <label class="custom-file-label" for="avatar-file">Chọn tệp</label>
                        </div>
                    </div>    
                    <h4 class="font-weight-semi-bold form-group">
                        <label for="description">Giới thiệu bản thân: </label>
                        <textarea class="form-control" id="description" rows="3" name="description">{{ $user->description }}</textarea>
                    </h4>
                </div>

                <div class="col-lg-3 pb-5">
                    <button type="submit" class="btn btn-primary w-100">Cập nhật</button>
                    <a href="{{ route('user.info.index') }}" class="btn btn-danger w-100 mt-4">Hủy</a>
                </div>
            </div>
        </form>
    </div>
    <!-- Shop Detail End -->
    @push('scripts')
        <script>
            let avatarFile = null;
        </script>
        <script src="{{ asset('js/user/edit-info.js') }}"></script>
    @endpush
@endsection
