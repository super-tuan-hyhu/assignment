@extends('admin.layout.master')
@section('title', 'Category')
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
                                Quản lý Image Product : {{ mb_strtoupper($product->name) }}
                            </span>
                        </h3>
                        <a href="{{ route('admin.product.listProduct') }}" class="btn btn-sm fw-bold btn-primary" >Quay Lại</a>
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
                                                ID IMAGE
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px ">
                                                ID PRODUCT
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px  pe-13">
                                                IMAGE
                                            </th>

                                            <th class="p-0 pb-3 w-100px ">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($image as $key => $list)
                                        @if($list->product_id == $product->id)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            {{ $list->product_id }}</a>
                                                        <!-- <span class="text-gray-500 fw-semibold d-block fs-7">{{ $list->email }}</span> -->
                                                    </div>
                                                </div>
                                            </td>

                                            <td class=" pe-13">
                                                <img src="../assetss/img/imageProducts/{{ $list->image }}" alt="" width="100px" height="100px">
                                            </td>

                                            <td class=" d-flex justify-content-center">

                                                <a href="" class="btn btn-sm btn-icon btn-bg-success btn-active-color-success w-30px h-30px">
                                                    <i class="fa-solid fa-pen text-light"></i>
                                                </a>
                                                <a href="{{ route('admin.product.imageDeleteListPro', ['proId' => $product->id,'imgID' => $list->id]) }}" onclick="return confirm('Bạn có thực sự muốn xóa hình ảnh này không?')" class="btn btn-sm btn-icon btn-bg-danger btn-active-color-danger w-30px h-30px ms-3">
                                                    <i class="fa-solid fa-trash text-light"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                <h3 class="card-title align-items-start d-flex">
                                    <span class="card-label fw-bold text-gray-800">
                                        <form action="{{ route('admin.product.imagePostListPro', $product->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="input-group mt-5 mb-5">
                                                <input type="file" name="image[]" id="inputGroupFile02" multiple>
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Thêm Ảnh</button>
                                        </form>
                                    </span>
                                </h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection