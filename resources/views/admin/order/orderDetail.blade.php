@extends('admin.layout.master')
@section('title', 'Users')
@section('body')

<div class="d-flex">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="col-xl-12 mb-5 mb-xl-10">
            <div class="card card-flush h-xl-100">
                <div class="card-header pt-5 w-100">
                    <div class="d-flex justify-content-between mb-10 w-100">
                        @if(session('message'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('message') }}
                        </div>
                        @endif
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">
                                Quản lý người dùng
                            </span>
                        </h3>
                        <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">Add Target</a>
                    </div>
                </div>

                <div class="card-body pt-2">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_stats_widget_16_tab_1">
                            <div class="table-responsive">
                                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0 ">
                                            <th class="p-0 pb-3 min-w-100px ">
                                                MÃ ĐƠN HÀNG
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px text-center">
                                                NGƯỜI ĐẶT HÀNG
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px text-center">
                                                TRẠNG THÁI
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px text-center">
                                                PHONE
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px text-center">
                                                EMAIL
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px text-center">
                                                ADDRESS
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px text-center ">
                                                NGÀY ĐẶT HÀNG
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>#shop{{ $order->id_order }}</td>

                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            {{ $order->accepter }}</a>
                                                        <!-- <span class="text-gray-500 fw-semibold d-block fs-7">{{ $order->email }}</span> -->
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            {{ $order->status }}</a>
                                                        <!-- <span class="text-gray-500 fw-semibold d-block fs-7">{{ $order->email }}</span> -->
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            {{ $order->phone }}</a>
                                                        <!-- <span class="text-gray-500 fw-semibold d-block fs-7">{{ $order->email }}</span> -->
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            {{ $order->email }}</a>
                                                        <!-- <span class="text-gray-500 fw-semibold d-block fs-7">{{ $order->email }}</span> -->
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            {{ $order->address }}</a>
                                                        <!-- <span class="text-gray-500 fw-semibold d-block fs-7">{{ $order->email }}</span> -->
                                                    </div>
                                                </div>
                                            </td>

                                            <td class=" pe-0">
                                                {{$order->created_at}}
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                                <tr>
                                                    <th class="p-0 pb-3 min-w-100px text-center">Product</th>
                                                    <th class="p-0 pb-3 min-w-100px text-center">Price</th>
                                                    <th class="p-0 pb-3 min-w-100px text-center">Number</th>
                                                    <th class="p-0 pb-3 min-w-100px text-center">Color</th>
                                                    <th class="p-0 pb-3 min-w-100px text-center">Size</th>
                                                    <th class="p-0 pb-3 min-w-100px text-center">Total Price</th>
                                                </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orderDetail as $orderDetaill)
                                        <tr>
                                            <td class="d-flex">
                                                <div class="tuan_cart">
                                                    <img src="../assetss/img/product/{{ $orderDetaill->product->image }}" data-src="../assetss/img/product/{{ $orderDetaill->product->image }}" width="100px" height="auto">
                                                </div>
                                                <span class="item_cart tuan-item">{{ $orderDetaill->name_product }}</span>
                                            </td>
                                            <td>
                                                <span class="item_cart check-cart">${{ $orderDetaill->price_product }}</span>
                                            </td>
                                            <td>
                                                <div class="options">
                                                    <span class="item_cart check-cart">{{ $orderDetaill->number_product }}</span>
                                                    <!-- <input type="text" value="{{ $orderDetaill->number_product }}" class="qty2" disabled> -->
                                                </div>
                                            </td>
                                            <td>
                                                <div class="options">
                                                    <span class="item_cart check-cart">{{ $orderDetaill->color }}</span>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="options">
                                                    <span class="item_cart check-cart">{{ $orderDetaill->size }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="options">
                                                    <span class="item_cart check-cart">${{ $orderDetaill->price_product}}</span>
                                                </div>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0 ">
                                            <th class="p-0 pb-3 min-w-100px ">
                                                Transport Free
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px text-center">
                                                Voucher
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px text-center">
                                                Total Price
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px text-center">
                                                Payment
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>#0 VND</td>

                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            </a>
                                                        <!-- <span class="text-gray-500 fw-semibold d-block fs-7">{{ $order->email }}</span> -->
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            {{ $order->total_price }}</a>
                                                        <!-- <span class="text-gray-500 fw-semibold d-block fs-7">{{ $order->email }}</span> -->
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            {{ $order->payment_methods }}</a>
                                                        <!-- <span class="text-gray-500 fw-semibold d-block fs-7">{{ $order->email }}</span> -->
                                                    </div>
                                                </div>
                                            </td>

                                            
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route('admin.order.order') }}"><button class="btn btn-primary">Quay Lại</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection