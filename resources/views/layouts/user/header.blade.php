<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row align-items-center py-3 px-xl-5">
        {{-- Logo --}}
        <div class="col-lg-3 d-none d-lg-block">
            <a href="" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span
                        class="text-primary font-weight-bold border px-3 mr-1">K</span>Mobile</h1>
            </a>
        </div>
        {{-- Logo end --}}
        {{-- Search input --}}
        <div class="col-lg-6 col-6 text-left">
            <form action="{{ route('user.product.findProductsByName') }}" method="GET">
                @csrf
                <div class="input-group">
                    <input type="text" name="name" class="form-control" placeholder="Tìm kiếm tên sản phẩm">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        {{-- Search end --}}
        {{-- Like and cart icon --}}
        <div class="col-lg-3 col-6 text-right">
            <a href="{{ route('user.cart.index') }}" class="btn border text-primary">
                <i class="fas fa-shopping-cart"></i>
                <span class="badge">{{ Cart::instance('cart')->content()->count() }}</span>
            </a>
            <a href="{{ route('user.order.index') }}" class="btn border text-primary">
                <i class="fa-solid fa-truck-fast"></i>
            <span class="badge">{{ auth()->check() ? auth()->user()->orders()->count() : 0 }}</span>
            </a>
        </div>
        {{-- Like and cart icon end --}}
    </div>
</div>
<!-- Topbar End -->
