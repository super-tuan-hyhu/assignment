@extends('front.layout.master')
@section('title', 'Order Detail')
@section('body')
<main>
    <div class="container margin_30">
        <div class="row">
            <aside class="col-lg-3" id="sidebar_fixed">
                <div class="filter_col">
                    <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
                    <div class="filter_type version_2">
                        <h4><a href="#filter_1" data-bs-toggle="collapse" class="opened">Categories</a></h4>
                        <div class="collapse show" id="filter_1">
                            <ul>
                                @foreach($category as $cate)
                                <li>
                                    <label class="container_check">
                                        <a href="{{ route('home.shop.shopCategory', $cate->id) }}">{{ $cate->name_cate }}</a>
                                        <small>{{ $cate->count() }}</small>
                                        
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- /filter_type -->
                    </div>
                    <!-- /filter_type -->
                    
                    <!-- /filter_type -->
            
                    <!-- /filter_type -->
                    <div class="filter_type version_2">
                        <h4><a href="#filter_4" data-bs-toggle="collapse" class="closed">Price</a></h4>
                        <div class="collapse" id="filter_4">
                            <ul>
                                <li>
                                    <label class="container_check">
                                        <a href="{{ route('home.shop.shopSortPrice', ['sort' => 'asc']) }}">Giá Cao Nhất</a>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">
                                        <a href="{{ route('home.shop.shopSortPrice', ['sort' => 'desc']) }}">Giá Thấp Nhất</a>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="filter_type version_2">
                        <h4><a href="#filter_4" data-bs-toggle="collapse" class="closed">View</a></h4>
                        <div class="collapse" id="filter_4">
                            <ul>
                                <li>
                                    <label class="container_check">
                                        <a href="{{ route('home.shop.shopSortView', ['view' => 'desc']) }}">View Cao Nhất</a>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">
                                        <a href="{{ route('home.shop.shopSortView', ['view' => 'asc']) }}">View Thấp Nhất</a>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /filter_type -->
                    <div class="buttons">
                    </div>
                </div>
            </aside>
            <!-- /col -->
            <div class="col-lg-9">
                
                <!-- /top_banner -->
                <div id="stick_here"></div>
                
                <!-- /toolbox -->
                <div class="row small-gutters">
                    @foreach($products as $product)
                    <div class="col-6 col-md-4">
                        <div class="grid_item">
                            <span class="ribbon off">-{{ round(($product->price_old - $product->price_new) / $product->price_old * 100) }}%</span>
                            <figure>
                                <a href="{{ route('home.detail.detailPro', $product->id) }}">
                                    <img class="img-fluid lazy" src="../assetss/img/product/{{ $product->image }}" data-src="../assetss/img/product/{{ $product->image }}" alt="">
                                </a>
                                <div data-countdown="2019/05/15" class="countdown"></div>
                            </figure>
                            <a href="product-detail-1.html">
                                <h3>{{ mb_strtoupper($product->name) }}</h3>
                            </a>
                            <div class="price_box">
                                <span class="new_price">${{ $product->price_new }}</span>
                                <span class="old_price">${{ $product->price_old }}</span>
                            </div>
                            <ul>
                                <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                                <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                                <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                            </ul>
                        </div>
                        <!-- /grid_item -->
                    </div>
                    @endforeach
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
                <!-- /row -->
                
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>

@endsection