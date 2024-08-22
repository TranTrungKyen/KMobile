@extends('layouts.admin.master-layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <div class="col-6">
                    <h3 class="fw-bold">Quản lý khuyến mại</h3>
                </div>
                <div class="col-6 float-end">
                    <a href="{{ route('admin.sale.create') }}" class="btn btn-primary float-end">Thêm mới</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Khuyến mại</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mô tả</th>
                                            <th>Ngày bắt đầu</th>
                                            <th>Ngày kết thúc</th>
                                            <th>Ngày cập nhật</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mô tả</th>
                                            <th>Ngày bắt đầu</th>
                                            <th>Ngày kết thúc</th>
                                            <th>Ngày cập nhật</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($sales as $index => $item)
                                            <tr data-id="{{ $item->id }}">
                                                <td>{{ ++$index }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->start_at }}</td>
                                                <td>{{ $item->end_at }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a class="btn shadow-none"
                                                            href="#">
                                                            <i class="fa-regular fa-pen-to-square"></i>
                                                        </a>
                                                        <button class="btn shadow-none toggle-delete-brand-js" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal"
                                                            data-name="{{ $item->description }}"
                                                            data-route="{{ route('admin.sale.delete', ['id' => $item->id]) }}">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
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
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/admin/sale/list-sale.js') }}"></script>
@endpush
