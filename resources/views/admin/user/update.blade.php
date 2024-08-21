@extends('admin.layout.master')
@section('title', 'Users')
@section('body')
<!-- modal update user -->
<div class="content">
    <div class="d-flex">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="col-xl-12 mb-5 mb-xl-10">
                <div class="card card-flush h-xl-100">
                    <form action="{{ route('admin.users.updatePostUser') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="mt-3">
                                <label for="name">Name User</label>
                                <input type="text" name="name" id="name" value="{{ $listIdUser->name }}" class="form-control">
                                @error('name')
                                <span class="text-danger mt-5">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label for="Email">Email User</label>
                                <input type="text" name="email" id="email" value="{{ $listIdUser->email }}" class="form-control">
                                @error('email')
                                <span class="text-danger mt-5">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label for="Phone">Phone User</label>
                                <input type="number" name="phone" value="{{ $listIdUser->phone }}" class="form-control">
                                @error('phone')
                                <span class="text-danger mt-5">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label for="name">Name User</label>
                                <input type="text" name="address" value="{{ $listIdUser->address }}" class="form-control">
                                @error('phone')
                                <span class="text-danger mt-5">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="mt-3">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="1" {{ $listIdUser->role == 1 ? 'selected' : '' }}>Admin</option>
                                    <option value="2" {{ $listIdUser->role == 2 ? 'selected' : '' }}>User</option>
                                    
                                    <!-- Add more roles as needed -->
                                </select>
                                @error('role')
                                <span class="text-danger mt-5">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer mt-3">
                            <input type="hidden" name="id" value="{{ $listIdUser->id}}">
                            <a href="{{ route('admin.users.listUser') }}"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>
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