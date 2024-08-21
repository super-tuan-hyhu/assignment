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
                                Quản lý Category
                            </span>
                        </h3>
                        <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">Add Target</a>
                    </div>
                </div>

                <div class="card-body pt-2">
                    @if($listCategory->count() == 0)
                    <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">
                                Bạn Chưa có danh mục nào
                            </span>
                    </h3>
                    @elseif($listCategory->count() >= 1)
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_stats_widget_16_tab_1">
                            <div class="table-responsive">
                                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                            <th class="p-0 pb-3 min-w-100px ">
                                                ID
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px ">
                                                NAME CATEGORY
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px  pe-13">
                                                IMAGE
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px  pe-13">
                                                STATUS
                                            </th>
                                            <th class="p-0 pb-3 w-150px pe-7">
                                                UPDATE AT
                                            </th>
                                            <th class="p-0 pb-3 w-100px ">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($listCategory as $key => $list)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="{{ route('admin.users.updateUser', $list->id) }}" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6" >
                                                            {{ $list->name_cate }}</a>
                                                        <!-- <span class="text-gray-500 fw-semibold d-block fs-7">{{ $list->email }}</span> -->
                                                    </div>
                                                </div>
                                            </td>
                                            <td class=" pe-13">
                                                <img src="../assetss/img/category/{{ $list->img }}" alt="" width="100px" height="100px">
                                            </td>
                                            <td class=" pe-0">
                                                <span class="text-gray-600 fw-bold fs-6">
                                                    {{$list->status}}
                                                </span>
                                            </td>
                                            <td class=" pe-0">
                                                {{$list->created_at}}
                                            </td>
                                            <td class=" d-flex justify-content-center">

                                                <a href="{{ route('admin.category.updateCate', $list->id) }}" class="btn btn-sm btn-icon btn-bg-success btn-active-color-success w-30px h-30px">
                                                    <i class="fa-solid fa-pen text-light"></i>
                                                </a>
                                                <a href="{{ route('admin.category.deleteCate', $list->id) }}" onclick="return confirm('Do you really want to delete this user')" class="btn btn-sm btn-icon btn-bg-danger btn-active-color-danger w-30px h-30px ms-3">
                                                    <i class="fa-solid fa-trash text-light"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
<div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="addCategory" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addUser">ADD NEW USER</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.category.addCategory') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mt-3">
                        <label for="name">Name Category</label>
                        <input type="text" name="name_cate" id="name" class="form-control">
                        @error('name_cate')
                        <span class="text-danger mt-5">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="Email">Image Category</label>
                        <input type="file" name="img" id="img" class="form-control">
                        @error('img')
                        <span class="text-danger mt-5">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="status">Status Category</label>
                        <input type="text" name="status" id="status" class="form-control">
                        @error('status')
                        <span class="text-danger mt-5">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">ADD USER</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal add user -->






@endsection