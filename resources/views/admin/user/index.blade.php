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
                                            <th>STT</th>
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
                                            <th>Stt</th>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Thời gian cập nhật</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($listUser as $index => $item)
                                            <tr data-id="{{ $item->id }}">
                                                <td>{{ ++$index }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <a class="btn"
                                                                href="{{ route('admin.user.detail', ['id' => $item->id]) }}">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a class="btn"
                                                                href="{{ route('admin.user.edit', ['id' => $item->id]) }}">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button type="button" class="btn toggle-active-user-js"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                data-name="{{ $item->name }}"
                                                                data-route="{{ route('admin.user.active', ['id' => $item->id]) }}"
                                                                data-active="{{ $item->active }}">
                                                                @php
                                                                    $iconActive = __('content.common.icon')[
                                                                        $item->active ? 'lock' : 'unlock'
                                                                    ];
                                                                @endphp
                                                                <i class="{{ $iconActive }}"></i>
                                                            </button>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button class="btn toggle-delete-user-js" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal"
                                                                data-name="{{ $item->name }}"
                                                                data-route="{{ route('admin.user.delete', ['id' => $item->id]) }}">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button class="btn reset-password-user-js" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal"
                                                                data-name="{{ $item->name }}"
                                                                data-route="{{ route('admin.user.reset-password', ['id' => $item->id]) }}">
                                                                <i class="fas fa-key"></i>
                                                            </button>
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

    <!-- Modal -->
    <div id="container-modal">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
    <script src="{{ asset('js/admin/user/list-user.js') }}"></script>
@endpush
