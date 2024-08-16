@extends('layouts.admin.master-layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header justify-content-between">
                <h3 class="fw-bold mb-3">Chi tiết</h3>
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
                        <a href="#">Chi tiết</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Chi tiết người dùng </div>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-12 h5">
                                    <div class="row text-center">
                                        <div class="col-md-12">
                                            <div class="avatar avatar-xxl">
                                                <img src="{{ ($user->avatar) ? Storage::url($user->avatar) : asset(AVT_URL['DEFAULT']) }}" alt="..." class="avatar-img rounded-circle">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <p class="h5">{{ $user->name }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8 offset-md-4">
                                            <div class="row">
                                                <div class="col-md-3 fw-bold">
                                                    Email:
                                                </div>
                                                <div class="col">
                                                    {{ $user->email }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8 offset-md-4">
                                            <div class="row">
                                                <div class="col-md-3 fw-bold">
                                                    Vai trò:
                                                </div>
                                                <div class="col">
                                                    {{ __('content.common.role')[$user->role->name] }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8 offset-md-4">
                                            <div class="row">
                                                <div class="col-md-3 fw-bold">
                                                    Số điện thoại:
                                                </div>
                                                <div class="col">
                                                    {{ $user->phone }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8 offset-md-4">
                                            <div class="row">
                                                <div class="col-md-3 fw-bold">
                                                    Địa chỉ:
                                                </div>
                                                <div class="col">
                                                    {{ $user->address }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8 offset-md-4">
                                            <div class="row">
                                                <div class="col-md-3 fw-bold">
                                                    Giới tính:
                                                </div>
                                                <div class="col">
                                                    {{ __('content.common.gender.male') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8 offset-md-4">
                                            <div class="row">
                                                <div class="col-md-3 fw-bold">
                                                    Mô tả:
                                                </div>
                                                <div class="col">
                                                    {{ $user->description }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8 offset-md-4">
                                            <div class="row">
                                                <div class="col-md-3 fw-bold">
                                                    Ngày cập nhật:
                                                </div>
                                                <div class="col">
                                                    {{ $user->updated_at }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
