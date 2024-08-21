@extends('admin.layout.master')
@section('title', 'Category')
@section('body')
<!-- modal update user -->
<div class="content">
    <div class="d-flex">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="col-xl-12 mb-5 mb-xl-10">
                <div class="card card-flush h-xl-100">
                    <form action="{{ route('admin.category.updatePostCate') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mt-3">
                                <label for="name">Name Category</label>
                                <input type="text" name="name" id="name" value="{{ $category->name_cate }}" class="form-control">
                                @error('name')
                                <span class="text-danger mt-5">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label for="Email">Image Category</label>
                                <img src="../assetss/img/category/{{ $category->img }}" alt="" width="100px" height="100px">
                                <input type="file" name="img" id="img" class="form-control">
                                <input type="hidden" name="image_old" id="image_old" value="{{ $category->img }}" class="form-control">
                                @error('img')
                                <span class="text-danger mt-5">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label for="name">Status</label>
                                <input type="text" name="status" id="status" value="{{ $category->status }}" class="form-control">
                                @error('status')
                                <span class="text-danger mt-5">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer mt-3">
                            <input type="hidden" name="id" value="{{ $category->id}}">
                            <a href="{{ route('admin.category.listCategory') }}"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>
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