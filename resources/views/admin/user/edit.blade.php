@extends('layouts.admin.master-layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header justify-content-between">
                <h3 class="fw-bold mb-3">Chỉnh sửa</h3>
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
                        <a href="#">Chỉnh sửa</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Chỉnh sửa người dùng</div>
                        </div>
                        <form id="update-user-form" action="{{ route('admin.user.update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <span class="text-danger">*</span>
                                            <input class="form-control" type="email" id="email" name="email"
                                                placeholder="Nhập email" value="{{ $user->email ?? old('email') }}">
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
                                                placeholder="Nhập họ tên" value="{{ $user->name ?? old('name') }}">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">
                                                    {{ $errors->first('name') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Số điện thoại</label>
                                            <input class="form-control" type="text" id="phone" name="phone"
                                                placeholder="Nhập số điện thoại" value="{{ $user->phone ?? old('phone') }}">
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
                                                @foreach (GENDERS as $gender => $value)
                                                    @php
                                                        $checked =
                                                            old('gender') == $value
                                                                ? 'checked'
                                                                : ($user->gender == $value
                                                                    ? 'checked'
                                                                    : '');
                                                    @endphp
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            id="female" value="{{ $value }}" {{ $checked }}>
                                                        <label class="form-check-label" for="female">
                                                            {{ __('content.common.gender')[$gender] }}
                                                        </label>
                                                    </div>
                                                @endforeach
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
                                                        @php
                                                            $selected =
                                                                old('role_id') == $value
                                                                    ? 'selected'
                                                                    : ($user->role_id == $value
                                                                        ? 'selected'
                                                                        : '');
                                                        @endphp
                                                        <option value="{{ $value }}" {{ $selected }}>
                                                            {{ __('content.common.role')[$role] }} </option>
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
                                            <div class="row">
                                                <label for="avatar">Ảnh đại diện {{ !empty($user->avatar) ? $user->avatar : '' }}</label>
                                                <input class="form-control" type="file" id="avatar" name="avatar"
                                                    accept="image/*">
                                            </div>
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
                                                placeholder="Nhập địa chỉ" value="{{ $user->address ?? old('email') }}">
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
                                            <textarea name="description" id="description" class="form-control" rows="5">{{ $user->address ?? old('description')}}</textarea>
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
                                <button class="btn btn-success">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
