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
                        <div class="card-body">
                            <div class="row">
                                <form action="#" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <span class="text-danger">*</span>
                                                <input class="form-control" type="email" id="email" name="email"
                                                    placeholder="Nhập email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Họ tên</label>
                                                <span class="text-danger">*</span>
                                                <input class="form-control" type="text" id="name" name="name"
                                                    placeholder="Nhập họ tên">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Mật khẩu</label>
                                                <span class="text-danger">*</span>
                                                <input class="form-control" type="password" id="password" name="password"
                                                    placeholder="Nhập mật khẩu">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Xác nhận mật khẩu</label>
                                                <span class="text-danger">*</span>
                                                <input class="form-control" type="password" id="password" name="password"
                                                    placeholder="Nhập xác nhận mật khẩu">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Số điện thoại</label>
                                                <input class="form-control" type="text" id="phone" name="phone"
                                                    placeholder="Nhập số điện thoại">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">Giới tính</label>
                                                <div class="d-flex">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            id="female" value="0" checked="">
                                                        <label class="form-check-label" for="female">
                                                            Female
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            id="male" value="1">
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
                                                <select class="form-select" id="role" name="role">
                                                    <option value="" hidden selected disabled>Chọn vai trò</option>
                                                    <option value="2">Nhân viên</option>
                                                    <option value="3">Khách hàng</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="avatar">Ảnh đại diện</label>
                                                <input class="form-control" type="file" id="avatar" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="address">Địa chỉ</label>
                                                <input class="form-control" type="text" id="address" name="address"
                                                    placeholder="Nhập địa chỉ">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Mô tả</label>
                                                <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
