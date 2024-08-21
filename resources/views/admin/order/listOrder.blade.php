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
                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                            <th class="p-0 pb-3 min-w-100px ">
                                                MÃ ĐƠN HÀNG
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px ">
                                                NGƯỜI ĐẶT HÀNG
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px ">
                                                TRẠNG THÁI
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px  pe-13">
                                                NGÀY ĐẶT HÀNG
                                            </th>
                                            <th class="p-0 pb-3 w-150px pe-7 text-center">
                                                CHI TIẾT
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order as $key => $list)
                                        <tr>
                                            <td>#shop{{ $list->id_order }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6" >
                                                            {{ $list->accepter }}</a>
                                                        <!-- <span class="text-gray-500 fw-semibold d-block fs-7">{{ $list->email }}</span> -->
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6" >
                                                            {{ $list->status }}</a>
                                                        <!-- <span class="text-gray-500 fw-semibold d-block fs-7">{{ $list->email }}</span> -->
                                                    </div>
                                                </div>
                                            </td>
                                            
                                            <td class=" pe-0">
                                                {{$list->created_at}}
                                            </td>
                                            <td class=" d-flex justify-content-center">

                                                <a href="{{ route('admin.order.orderDetail', $list->id_order) }}" class="btn btn-sm btn-icon btn-bg-success btn-active-color-success w-30px h-30px">
                                                    <i class="fa-solid fa-pen text-light"></i>
                                                </a>

                                                @if($list->status != 'Giao Thành Công' && $list->status != 'Đã Nhận Hàng')
                                                <form action="{{ route('admin.order.updateOrder', $list->id_order) }}" method="post">
                                                    @csrf
                                                        <button type="submit" class="btn btn-sm btn-icon btn-bg-danger btn-active-color-danger w-30px h-30px ms-3">
                                                            <i class="fa-solid fa-up-long text-light"></i>
                                                        </button>
                                                </form>
                                                @endif
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $order->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection