@extends('admin.layout.master')
@section('title', 'Comment')
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
                                Quản lý Bình Luận
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
                                                NAME PRODUCT
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px ">
                                                AUTHOR
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px  pe-13">
                                                COMMENT
                                            </th>
                                            <th class="p-0 pb-3 w-150px pe-7">
                                                STAR
                                            </th>
                                            <th class="p-0 pb-3 w-100px ">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($listComments as $key => $list)
                                        <tr>
                                            <td>{{ $list->pro->name }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6" >
                                                            {{ $list->user->name }}</a>
                                                        <span class="text-gray-500 fw-semibold d-block fs-7">{{ $list->user->email }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class=" pe-13">
                                                <span class="text-gray-600 fw-bold fs-6">
                                                    {{ $list->comment }}
                                                </span>
                                            </td>
                                            <td class=" pe-0">
                                                {{$list->vote_star}}
                                            </td>
                                            <td class=" d-flex justify-content-center">
                                                <a href="{{ route('admin.comment.deleteComment', $list->id) }}" onclick="return confirm('Do you really want to delete this user')" class="btn btn-sm btn-icon btn-bg-danger btn-active-color-danger w-30px h-30px ms-3">
                                                    <i class="fa-solid fa-trash text-light"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $listComments->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection