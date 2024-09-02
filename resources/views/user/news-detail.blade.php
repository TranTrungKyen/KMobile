@extends('layouts.user.master-layout')
@push('style')
    <link rel="stylesheet" href="{{ asset('css/user/product-detail.css') }}">
@endpush
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Chi tiết sản phẩm</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('user.home') }}">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0"><a href="{{ route('user.product.index') }}">Sản phẩm</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Chi tiết</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    
    <!-- Shop Detail Start -->
    <div class="container-fluid px-xl-5 py-5">
        <div class="row">
            <div class="col-md-12">
                <img src="https://fastly.picsum.photos/id/13/2500/1667.jpg?hmac=SoX9UoHhN8HyklRA4A3vcCWJMVtiBXUg0W4ljWTor7s" class="img-fluid w-100 mh-448" alt="Responsive image">
            </div>
            <div class="col-md-12">
                <h1 class="text-truncate mt-3">Tiêu đề</h1>
                <p class="text-muted">Ngày đăng: 27-08-2024</p>
                <p>
                    <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore a eum error nobis, autem earum quae debitis aliquam excepturi, quis odio minus culpa modi eaque? Cum dicta animi veniam molestiae?</span>
                    <span>Enim placeat vero quia voluptatum nemo et? Quaerat illo delectus ducimus accusantium quidem eius corporis pariatur distinctio saepe vero rerum, minima eveniet blanditiis in incidunt autem. Magnam at dolorem tempore!</span>
                    <span>Odit quasi, distinctio culpa dolores sint, debitis officia minima rerum, porro aliquam voluptatem itaque ipsa voluptate unde? Quisquam laudantium ex quos, repellat odio architecto aperiam similique earum et voluptates blanditiis.</span>
                    <span>Repudiandae earum suscipit quisquam dolores ducimus! Explicabo beatae amet quis consequatur maiores odio eos esse magni neque est modi at sed quasi facere voluptas sunt, ullam quae accusamus delectus? Quis.</span>
                    <span>Sequi, quas. Incidunt, maxime nihil! Ut est quam voluptatem dolores culpa corrupti vero sint, a consequatur repudiandae, ad quis nam, obcaecati id esse error libero? Neque quos ad accusantium error.</span>
                    <span>Reiciendis modi unde, iure asperiores voluptatem natus doloribus odio officia quos est nisi accusantium neque quia dolor adipisci, labore tempore vitae. Quasi adipisci numquam alias beatae voluptates, suscipit reprehenderit harum!</span>
                    <span>Accusantium natus, libero reiciendis, magnam fuga corporis unde similique suscipit harum repellat maxime laboriosam! Voluptas, voluptatum pariatur aspernatur sed repudiandae ratione quaerat soluta dolores delectus, impedit quae autem ex provident.</span>
                    <span>Nam atque porro ad quo, et impedit in soluta quas corporis exercitationem officiis nemo eum veniam dolores accusamus qui vel asperiores modi eligendi error aliquam ducimus magni at? Ex, perferendis.</span>
                    <span>Accusamus fuga quisquam architecto facere ratione cumque aliquid voluptatem animi impedit velit quo accusantium, necessitatibus dolore, modi, amet vitae tempora. Unde aliquid eius amet magnam atque veniam nobis eos accusamus.</span>
                    <span>Quas quae atque repellat inventore nostrum temporibus veritatis, obcaecati illo! Est sequi maxime, sunt dicta eaque adipisci quia dolore dolores? Blanditiis ducimus cumque odit nemo tempore. Cum quas aliquam pariatur?</span>
                    <span>Magnam voluptatem eos unde soluta inventore esse, mollitia sequi quam placeat officiis incidunt quod, provident expedita beatae cumque! Temporibus in ipsam magni minima fuga vero sunt at, enim assumenda neque!</span>
                    <span>Voluptas dolores blanditiis, nam culpa id minima natus deserunt sit cum facilis cupiditate doloremque quisquam saepe magnam enim obcaecati, dolorum reprehenderit? Saepe facilis debitis, animi nam alias voluptas fuga hic.</span>
                    <span>Ratione labore voluptates, animi quidem quae, vitae maxime ad ducimus beatae saepe dolore libero magni blanditiis excepturi eaque exercitationem sequi, accusamus illum sed dolorum doloremque earum? Voluptas totam possimus cumque.</span>
                    <span>Ex, hic. Veniam quidem tempora perferendis. In assumenda cumque laboriosam aut voluptate, vero nam perferendis velit ducimus totam atque itaque reprehenderit deserunt cupiditate iusto molestiae explicabo architecto harum corporis ab.</span>
                    <span>Veniam iusto quas necessitatibus hic eum. Nihil quos praesentium accusantium, explicabo deleniti molestias debitis aperiam illum assumenda maiores! Ab autem velit ex aperiam harum aliquid dolore magni error commodi voluptatem.</span>
                    <span>Exercitationem odit nihil deserunt perspiciatis doloribus impedit, a quis repudiandae dignissimos inventore, doloremque rerum quibusdam, officia dolorem sit nostrum fugiat alias eos ex. Voluptas numquam harum natus totam eius rerum!</span>
                    <span>Quos, autem quo? Officia quibusdam voluptatibus autem deleniti non accusamus at culpa, quo facere repudiandae consequuntur consectetur odit adipisci reprehenderit. Laborum iure ut eius non architecto aliquid recusandae exercitationem officiis!</span>
                    <span>Placeat rem repellat ab, sequi delectus voluptatem mollitia aut totam iure odio sunt omnis consequatur blanditiis error laborum ratione architecto tenetur deleniti at. Odit ex, amet voluptas iste repellat perspiciatis!</span>
                    <span>Iure, a modi iusto non placeat soluta eveniet error dolor accusantium. Qui sit fugiat unde. Nisi maiores officiis adipisci error quidem minima totam, doloremque animi! Fugiat qui quia incidunt iure.</span>
                    <span>Illo quisquam iure veritatis voluptate ex laboriosam commodi harum facilis adipisci voluptas, beatae qui neque eius eligendi mollitia repellat nesciunt possimus ipsa corporis iste. Praesentium quod alias nemo incidunt deleniti.</span>
                </p>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

    <!-- News Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Tin tức mới<i></i></span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    <div class="card product-item border-0 mb-4">
                        <div
                            class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            @php
                                $pathImage = asset(AVT_URL['DEFAULT']);
                            @endphp
                            <img class="img-fluid w-100 h-100" src="{{ $pathImage }}" alt="....">
                        </div>
                        <div class="card-body border-left border-right text-left">
                            <h5 class="text-truncate mb-3">Tiêu đề</h5>
                            <p class="text-muted">27-08-2024</p>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus, nemo ut similique debitis enim quae voluptas animi obcaecati accusantium mollitia inventore nihil sit ducimus, sunt voluptate quas dolorem dolores rem!</p>
                        </div>
                        <div class="card-footer d-flex justify-content-center bg-light border">
                            <a href="{{ route('user.news.detail') }}" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                        </div>
                    </div>
                    {{-- @foreach ($listProduct as $item)
                        <div class="card product-item border-0 mb-4" data-product-id="{{ $item->id }}">
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                @php
                                    $pathImage = !empty($item->images->first()->path)
                                        ? Storage::url($item->images->first()->path)
                                        : asset(AVT_URL['DEFAULT']);
                                @endphp
                                <img class="img-fluid w-100 h-100" src="{{ $pathImage }}" alt="{{ $item->name }}">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{ $item->name }}</h6>
                                <h5 class="text-truncate mb-3">{{ $item->title }}</h5>
                                <div class="d-flex justify-content-center">
                                    @if (!empty($item->price_current))
                                        <h6 class="text-muted mr-2"><del class="price-js--vi" data-amount="{{ $item->price_original }}">{{ $item->price_original }}</del></h6>
                                        <h6 class="price-js--vi" data-amount="{{ $item->price_current }}">{{ $item->price_current }}</h6>
                                    @else
                                        <h6 class="price-js--vi" data-amount="{{ $item->price_original }}">{{ $item->price_original }}</h6>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-center bg-light border">
                                <a href="{{ route('user.product.detail', ['id' => $item->id]) }}" class="btn btn-sm text-dark p-0"><i
                                        class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                            </div>
                        </div>
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>
    <!-- News End -->
@endsection
@push('scripts')
    <script>
        
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                let message = @json($error);
                toastr.error(message);
            @endforeach
        @endif
    </script>
    <script src="{{ asset('js/user/product-detail.js') }}"></script>
@endpush
