<div class="col-lg-9">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
        <a href="" class="text-decoration-none d-block d-lg-none">
            <h1 class="m-0 display-5 font-weight-semi-bold"><span
                    class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="{{ route('user.home') }}" class="nav-item nav-link">Trang chủ</a>
                <a href="{{ route('user.product.index') }}" class="nav-item nav-link">Sản phẩm mới nhất</a>
                <a href="{{ route('user.news.index') }}" class="nav-item nav-link">Tin tức</a>
                @php
                    $categories = getAllCategories();
                @endphp
                @foreach ($categories as $item)
                    <a href="{{ route('user.product.category', ['id' => $item->id]) }}" class="nav-item nav-link">{{ $item->name }}</a>
                @endforeach
            </div>
            <div class="navbar-nav ml-auto py-0">
                @if (auth()->check())
                    <a href="#" class="nav-item nav-link">Hi, {{ auth()->user()->name }}</a>
                    <a href="{{ route('user.logout') }}" class="nav-item nav-link">Đăng xuất</a>
                @else
                    <a href="{{ route('user.login') }}" class="nav-item nav-link">Đăng nhập</a>
                    <a href="{{ route('user.login') }}" class="nav-item nav-link">Đăng ký</a>
                @endif
            </div>
        </div>
    </nav>
</div>
