@extends('front.layout.master')
@section('title', 'Order Detail')
@section('body')

<main class="bg_gray">
    <div id="track_order tuancheckOrder">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-7 col-lg-9 tuancol13">
                    
                    <div class="card shadow mb-4 mb-5">
                        <form>
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Mã Đơn Hàng</th>
                                                <th>Ngày Đặt Hàng</th>
                                                <th>Trạng Thái</th>
                                                <th>Người Nhận</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>#{{ $order->id_order }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>{{ $order->status }}</td>
                                                <td>{{ $order->accepter }}</td>
                                                <td>{{ $order->phone }}</td>
                                                <td>{{ $order->email }}</td>
                                                <td>{{ $order->address }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Number</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <th>Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orderDetail as $orderDetaill)
                                            <tr>
                                                <td class="d-flex">
                                                    <div class="tuan_cart">
                                                        <img src="../assetss/img/product/{{ $orderDetaill->product->image }}" data-src="../assetss/img/product/{{ $orderDetaill->product->image }}" width="75px" height="auto">
                                                    </div>
                                                    <span class="item_cart">{{ $orderDetaill->name_product }}</span>
                                                </td>
                                                <td>
                                                    <span class="item_cart">${{ $orderDetaill->price_product }}</span>
                                                </td>
                                                <td>
                                                    <div class="options">
                                                        <span class="item_cart">{{ $orderDetaill->number_product }}</span>
                                                        <!-- <input type="text" value="{{ $orderDetaill->number_product }}" class="qty2" disabled> -->
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="options">
                                                        <span class="item_cart">{{ $orderDetaill->color }}</span>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="options">
                                                        <span class="item_cart">{{ $orderDetaill->size }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="options">
                                                        <span class="item_cart">${{ $orderDetaill->price_product}}</span>
                                                    </div>
                                                </td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Transport Free</th>
                                                <th>Voucher</th>
                                                <th>Total Price</th>
                                                <th>Payment</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>$0</td>
                                                <td></td>
                                                <td>${{ $order->total_price }}</td>
                                                <td>{{ $order->payment_methods }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </form>

                        <div class="d-flex text-center">
                            <a href="{{ route('home.order.listOrder') }}">
                                <button class="btn btn-primary ms-3 mb-3">Quay Lại</button>
                            </a>

                            <div>
                                <button class="btn btn-success ms-3 mb-3">Hủy Đơn</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /track_order -->

    <div class="bg_white mt-5">
        <div class="container margin_60_35">
            <div class="main_title">
                <h2>New Entries</h2>
                <span>Products</span>
                <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
            </div>
            <div class="owl-carousel owl-theme products_carousel">
                <div class="item">
                    <div class="grid_item">
                        <span class="ribbon new">New</span>
                        <figure>
                            <a href="product-detail-1.html">
                                <img class="img-fluid lazy" src="img/products/product_placeholder_square_medium.jpg" data-src="img/products/shoes/4.jpg" alt="">
                            </a>
                        </figure>
                        <a href="product-detail-1.html">
                            <h3>ACG React Terra</h3>
                        </a>
                        <div class="price_box">
                            <span class="new_price">$110.00</span>
                        </div>
                        <ul>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                        </ul>
                    </div>
                    <!-- /grid_item -->
                </div>
                <!-- /item -->
                <div class="item">
                    <div class="grid_item">
                        <span class="ribbon new">New</span>
                        <figure>
                            <a href="product-detail-1.html">
                                <img class="img-fluid lazy" src="img/products/product_placeholder_square_medium.jpg" data-src="img/products/shoes/5.jpg" alt="">
                            </a>
                        </figure>
                        <a href="product-detail-1.html">
                            <h3>Air Zoom Alpha</h3>
                        </a>
                        <div class="price_box">
                            <span class="new_price">$140.00</span>
                        </div>
                        <ul>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                        </ul>
                    </div>
                    <!-- /grid_item -->
                </div>
                <!-- /item -->
                <div class="item">
                    <div class="grid_item">
                        <span class="ribbon hot">Hot</span>
                        <figure>
                            <a href="product-detail-1.html">
                                <img class="img-fluid lazy" src="img/products/product_placeholder_square_medium.jpg" data-src="img/products/shoes/8.jpg" alt="">
                            </a>
                        </figure>
                        <a href="product-detail-1.html">
                            <h3>Air Color 720</h3>
                        </a>
                        <div class="price_box">
                            <span class="new_price">$120.00</span>
                        </div>
                        <ul>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                        </ul>
                    </div>
                    <!-- /grid_item -->
                </div>
                <!-- /item -->
                <div class="item">
                    <div class="grid_item">
                        <span class="ribbon off">-30%</span>
                        <figure>
                            <a href="product-detail-1.html">
                                <img class="img-fluid lazy" src="img/products/product_placeholder_square_medium.jpg" data-src="img/products/shoes/2.jpg" alt="">
                            </a>
                        </figure>
                        <a href="product-detail-1.html">
                            <h3>Okwahn II</h3>
                        </a>
                        <div class="price_box">
                            <span class="new_price">$90.00</span>
                            <span class="old_price">$170.00</span>
                        </div>
                        <ul>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                        </ul>
                    </div>
                    <!-- /grid_item -->
                </div>
                <!-- /item -->
                <div class="item">
                    <div class="grid_item">
                        <span class="ribbon off">-50%</span>
                        <figure>
                            <a href="product-detail-1.html">
                                <img class="img-fluid lazy" src="img/products/product_placeholder_square_medium.jpg" data-src="img/products/shoes/3.jpg" alt="">
                            </a>
                        </figure>
                        <a href="product-detail-1.html">
                            <h3>Air Wildwood ACG</h3>
                        </a>
                        <div class="price_box">
                            <span class="new_price">$75.00</span>
                            <span class="old_price">$155.00</span>
                        </div>
                        <ul>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                        </ul>
                    </div>
                    <!-- /grid_item -->
                </div>
                <!-- /item -->
            </div>
            <!-- /products_carousel -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_white -->
</main>
<!--/main-->

@endsection