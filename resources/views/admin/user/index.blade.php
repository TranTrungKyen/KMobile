@extends('layouts.admin.master-layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <div class="col-6">
                    <h3 class="fw-bold">Quản lý người dùng</h3>
                </div>
                <div class="col-6 float-end">
                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary float-end">Thêm mới</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Người dùng</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Thời gian cập nhật</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Thời gian cập nhật</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($listUser as $item)
                                        <tr data-id="{{ $item->id }}">
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->updated_at }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <a class="btn" href="{{ route('admin.user.edit', ['id' => $item->id]) }}">
                                                            <i class="fa-regular fa-pen-to-square"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a class="btn" href="#">
                                                            <i class="fa-solid fa-lock"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a class="btn" href="#">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/admin/user/list-user.js') }}"></script>
@endpush
