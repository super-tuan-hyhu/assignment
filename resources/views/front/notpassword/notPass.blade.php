@extends('front.layout.master')
@section('title', 'Order Detail')
@section('body')
<main class="bg_gray">
<div class="container margin_30">
<div class="forgot_pw">
    @if(session('messageError'))
        <h3 class="text-danger">{{ session('messageError') }}</h3>
    @endif
    <form action="{{ route('home.notPass.postViewPass') }}" method="post">
        @csrf
        <div class="form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Type your email">
            @error('email')
                <span class="text-danger mt-5">{{ $message }}</span>
            @enderror
        </div>
        <p>Bạn Vui lòng Nhập Đúng Email Của Mình.</p>
        <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
    </form>
    
</div>
</div>
</main>
@endsection