@extends('admin.layout.master')
@section('title', 'Product')
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
                        <h3 class="card-title align-items-start flex-column d-flex">
                            <span class="card-label fw-bold text-gray-800">
                                Quản lý Product
                            </span>
                        </h3>

                        <div class="card-title align-items-start flex-column">
                            <form class="search" action="{{ route('admin.product.listProduct') }}" method="GET">
                                <input type="text" name="search" class="searchTerm" placeholder="Bạn đang tìm gì?">
                                <button type="submit" class="searchButton">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">Add Target</a>
                    </div>
                </div>

                <div class="card-body pt-2">
                    @if($listProduct->count() == 0)
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">
                            Bạn Chưa có danh mục nào
                        </span>
                    </h3>
                    @elseif($listProduct->count() >= 1)
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_stats_widget_16_tab_1">
                            <div class="table-responsive">
                                <table id="example" class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                            <th class="p-0 pb-3 min-w-100px ">
                                                ID
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px ">
                                                NAME PRODUCT
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px  pe-13">
                                                IMAGE
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px  pe-13">
                                                PRICE
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px  pe-13">
                                                SALE %
                                            </th>
                                            <th class="p-0 pb-3 w-150px pe-7">
                                                CATEGORY_ID
                                            </th>
                                            <th class="p-0 pb-3 w-100px ">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($listProduct as $key => $list)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="{{ route('admin.product.updateProduct', $list->id) }}" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            {{ $list->name }}</a>
                                                        <!-- <span class="text-gray-500 fw-semibold d-block fs-7">{{ $list->email }}</span> -->
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="pe-13">
                                                <img src="../assetss/img/product/{{ $list->image }}" alt="" width="100px" height="100px">
                                            </td>
                                            <td class=" pe-0">
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                                            ${{ $list->price_new }}</a>
                                                        <span class="text-gray-500 fw-semibold d-block fs-7"><del>${{ $list->price_old }}</del></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class=" pe-0">
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <button type="button" class="btn btn-danger">
                                                            {{ round(($list->price_old - $list->price_new) / $list->price_old * 100) }}%
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class=" pe-0">
                                                @foreach($listCategory as $listCate)
                                                @if($listCate->id == $list->category_id)
                                                {{$listCate->name_cate}}
                                                @endif
                                                @endforeach
                                            </td>
                                            <td class=" d-flex justify-content-center">

                                                <a href="{{ route('admin.product.updateProduct', $list->id) }}" class="btn btn-sm btn-icon btn-bg-success btn-active-color-success w-30px h-30px">
                                                    <i class="fa-solid fa-pen text-light"></i>
                                                </a>
                                                <a href="{{ route('admin.product.deleteProduct', $list->id) }}" onclick="return confirm('Do you really want to delete this user')" class="btn btn-sm btn-icon btn-bg-danger btn-active-color-danger w-30px h-30px ms-3">
                                                    <i class="fa-solid fa-trash text-light"></i>
                                                </a>

                                                <a href="{{ route('admin.product.imageListPro', $list->id) }}" class="btn btn-sm btn-icon btn-bg-success btn-active-color-success w-30px h-30px ms-3">
                                                    <i class="fa-regular fa-image text-light"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-3"></div>
                                {{ $listProduct->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>




<!-- modal add user -->
<div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProduct" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addUser">ADD NEW PRODUCT</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.product.addProduct') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mt-3">
                        <label for="name">Name Product</label>
                        <input type="text" name="name" id="name" class="form-control">
                        @error('name')
                        <span class="text-danger mt-5">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="image">Image Category</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @error('image')
                        <span class="text-danger mt-5">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="price_old">Price Old</label>
                        <input type="text" name="price_old" id="price_old" class="form-control">
                        @error('price_old')
                        <span class="text-danger mt-5">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="name">Price New</label>
                        <input type="text" name="price_new" id="price_new" class="form-control">
                        @error('price_new')
                        <span class="text-danger mt-5">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mt-3">
                        <label for="description">Status Product</label>
                        <input type="text" name="description" id="description" class="form-control">
                        @error('description')
                        <span class="text-danger mt-5">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="category_id ">Category id</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="0">Chọn Danh Mục</option>
                            @foreach($listCategory as $listCate)
                            <option value="{{ $listCate->id }}">{{ $listCate->name_cate }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="text-danger mt-5">{{ $message }}</span>
                        @enderror
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">ADD PRODUCT</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal add user -->



@endsection