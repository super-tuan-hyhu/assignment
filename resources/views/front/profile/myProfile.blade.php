@extends('front.layout.master')
@section('title', 'Order Detail')
@section('body')

<main class="bg_gray">

    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Category</a></li>
                    <li>Page active</li>
                </ul>
            </div>
            <h1>Sign In or Create an Account</h1>
        </div>
        <!-- /page_header -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-8">
                <div class="box_account">
                    <h3 class="new_client">MY PROFILE </h3> <small class="float-right pt-2">* Required Fields</small>
                    @if(session('messageError'))
                    <h3 class="text-danger">{{ session('messageError') }}</h3>
                    @endif
                    <form action="{{ route('home.profile.update') }}" method="post">
                        @csrf
                        <div class="box_account">
                            <div class="form_container">
                                <div class="form-group">
                                    <label for="name" class="container_radio">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="container_radio">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}">
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="container_radio">Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="{{ Auth::user()->phone }}">
                                </div>
                                <div class="form-group">
                                    <label for="address" class="container_radio">Address</label>
                                    <input type="text" class="form-control" name="address" id="address" value="{{ Auth::user()->address }}">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="container_radio">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" value="{{ Auth::user()->password }}" >
                                </div>
                                <div class="text-center">
                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">    
                                <input type="submit" value="Register" class="btn_1 full-width"></div>
                               
                                
                            </div>
                        </div>
                    </form>
                    <div class="float-end"><a id="forgot" href="{{ route('home.notPass.getViewPass') }}">Lost Password?</a></div>
                    <a href="{{ route('homeUser')}}">
                        <button class="btn btn-primary">Quay Lại</button>
                    </a>
                </div>

            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>


@endsection