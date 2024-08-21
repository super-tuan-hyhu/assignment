@extends('admin.layout.master')
@section('title', 'Product')
@section('body')
<!-- modal update user -->
<div class="content">
    <div class="d-flex">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="col-xl-12 mb-5 mb-xl-10">
                <div class="card card-flush h-xl-100">
                    <form action="{{ route('admin.product.updatePostProduct') }}" method="post" enctype="multipart/form-data">
                           
                        @csrf
                        <div class="modal-body">
                            <div class="mt-3">
                                <label for="name">Name Product</label>
                                <input type="text" name="name" id="name" value="{{ $listProduct->name }}" class="form-control">
                                @error('name')
                                <span class="text-danger mt-5">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label for="Email">Image Category</label><br>
                                <img src="../assetss/img/product/{{ $listProduct->image }}" alt="" width="100px" height="100px">
                                <input type="file" name="image" id="image" class="form-control">
                                <input type="hidden" name="image_old" id="image_old" value="{{ $listProduct->image }}" class="form-control">
                                @error('img')
                                <span class="text-danger mt-5">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label for="price_old">Price Old</label>
                                <input type="text" name="price_old" id="price_old" class="form-control" value="{{ $listProduct->price_old }}">
                                @error('price_old')
                                <span class="text-danger mt-5">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label for="price_new">Price New</label>
                                <input type="text" name="price_new" id="price_new" class="form-control" value="{{ $listProduct->price_new }}">
                                @error('price_old')
                                <span class="text-danger mt-5">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label for="name">Status</label>
                                <input type="text" name="description" id="status" value="{{ $listProduct->description }}" class="form-control">
                                @error('description')
                                <span class="text-danger mt-5">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label for="category_id ">Category id</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="0">Chọn Danh Mục</option>
                                    @foreach($listCategory as $listCate)
                                    <option value="{{ $listCate->id }}" {{ $listCate->id == $listProduct->category_id ? 'selected' :'' }}>{{ $listCate->name_cate }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger mt-5">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer mt-3">
                            <input type="hidden" name="id" value="{{ $listProduct->id}}">
                            <a href="{{ route('admin.product.listProduct') }}"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>
                            <button type="submit" class="btn btn-primary ms-2">Update User</button>
                        </div>
                    </form>
                </div>
                <!-- end modal add user -->
            </div>
        </div>
    </div>
</div>


@endsection