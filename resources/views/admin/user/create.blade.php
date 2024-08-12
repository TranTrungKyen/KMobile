@extends('layouts.admin.master-layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header justify-content-between">
                <h3 class="fw-bold mb-3">Thêm mới</h3>
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
                        <a href="{{ route('admin.user.index') }}">Quản lý người dùng</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.user.create') }}">Thêm mới</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Thêm mới người dùng</div>
                        </div>
                        <form id="create-user-form" action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <span class="text-danger">*</span>
                                            <input class="form-control" type="email" id="email" name="email"
                                                placeholder="Nhập email" value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">
                                                    {{ $errors->first('email') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Họ tên</label>
                                            <span class="text-danger">*</span>
                                            <input class="form-control" type="text" id="name" name="name"
                                                placeholder="Nhập họ tên" value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">
                                                    {{ $errors->first('name') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Mật khẩu</label>
                                            <span class="text-danger">*</span>
                                            <input class="form-control" type="password" id="password" name="password"
                                                placeholder="Nhập mật khẩu">
                                            @if ($errors->has('password'))
                                                <span class="text-danger">
                                                    {{ $errors->first('password') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="confirm-password">Xác nhận mật khẩu</label>
                                            <span class="text-danger">*</span>
                                            <input class="form-control" type="password" id="confirm-password"
                                                name="password_confirm" placeholder="Nhập xác nhận mật khẩu">
                                            @if ($errors->has('password_confirm'))
                                                <span class="text-danger">
                                                    {{ $errors->first('password_confirm') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Số điện thoại</label>
                                            <input class="form-control" type="text" id="phone" name="phone"
                                                placeholder="Nhập số điện thoại" value="{{ old('phone') }}">
                                            @if ($errors->has('phone'))
                                                <span class="text-danger">
                                                    {{ $errors->first('phone') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Giới tính</label>
                                            <div class="d-flex">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="female" value="0" {{ (old('gender') == 0) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="female">
                                                        Female
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="male" value="1" {{ (old('gender') == 1) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="male">
                                                        Male
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role">Vai trò</label>
                                            <span class="text-danger">*</span>
                                            <select class="form-select" id="role" name="role_id">
                                                <option value="" hidden selected disabled>Chọn vai trò</option>
                                                @foreach (ROLES as $role => $value)
                                                    @if ($role != 'admin')
                                                        <option value="{{ $value }}" {{ ($value == old('role_id')) ? 'selected' : '' }}> {{ __('content.common.role')[$role] }} </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @if ($errors->has('role_id'))
                                                <span class="text-danger">
                                                    {{ $errors->first('role_id') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="avatar">Ảnh đại diện</label>
                                            <input class="form-control" type="file" id="avatar" name="avatar" accept="image/*" >
                                        </div>
                                        @if ($errors->has('avatar'))
                                            <span class="text-danger">
                                                {{ $errors->first('avatar') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="address">Địa chỉ</label>
                                            <input class="form-control" type="text" id="address" name="address"
                                                placeholder="Nhập địa chỉ" value="{{ old('email') }}">
                                            @if ($errors->has('address'))
                                                <span class="text-danger">
                                                    {{ $errors->first('address') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Mô tả</label>
                                            <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                                            @if ($errors->has('description'))
                                                <span class="text-danger">
                                                    {{ $errors->first('description') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/admin/user/create-form.js') }}"></script>
@endpush
