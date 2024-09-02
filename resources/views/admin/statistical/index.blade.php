@extends('layouts.admin.master-layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h1 class="ms-2">Thống kê</h1>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-calendar-day text-success"></i>
                                    </div>
                                </div>
                                <div class="col-8 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Doanh thu ngày hôm nay</p>
                                        <h4 class="card-title price-js--vi" data-amount="{{ $revenueCurrent['day'] }}">
                                            {{ $revenueCurrent['day'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-calendar-alt text-success"></i>
                                    </div>
                                </div>
                                <div class="col-8 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Doanh thu tháng nay</p>
                                        <h4 class="card-title price-js--vi" data-amount="{{ $revenueCurrent['month'] }}">
                                            {{ $revenueCurrent['month'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-calendar-check text-success"></i>
                                    </div>
                                </div>
                                <div class="col-8 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Doanh thu năm nay</p>
                                        <h4 class="card-title price-js--vi" data-amount="{{ $revenueCurrent['year'] }}">
                                            {{ $revenueCurrent['year'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thống kê doanh thu theo tháng</h4>
                        </div>
                        <div class="card-body">
                            <form id="statistical-form" action="{{ route('admin.statistical.find') }}" method="post">
                                @csrf
                                <div class="d-flex justify-content-between">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mb-0 me-2" for="start_date">Ngày bắt đầu</label>
                                        <input type="date" id="start_date" name="start_date" class="form-control input-date-js" placeholder="Chọn ngày bắt đầu">
                                    </div>
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mb-0 me-2" for="end_date">Ngày kết thúc</label>
                                        <input type="date" id="end_date" name="end_date" class="form-control input-date-js" placeholder="Chọn ngày kết thúc">
                                    </div>
                                    <div class="form-group d-flex align-items-center">
                                        <button type="submit" class="btn btn-primary">Hiển thị biểu đồ</button>
                                    </div>
                                </div>
                            </form>
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Doanh thu 3 tháng gần nhất</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="revenue-chart-three-months"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let lablesThreeMonths = @json($lablesThreeMonths);
        let dataThreeMonths = @json($dataThreeMonths);
    </script>
    <script src="{{ asset('js/admin/statistical.js') }}"></script>
@endpush
