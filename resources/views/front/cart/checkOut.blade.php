@extends('front.layout.master')
@section('title', 'Check Out')
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
        <div class="row">
            <form action="" method="post" class="row">
                @csrf
                <div class="col-lg-4 col-md-6">
                    <div class="step first">
                        <h3>1. User Info and Billing address</h3>
                        <ul class="nav nav-tabs" id="tab_checkout" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#tab_2" role="tab" aria-controls="tab_2" aria-selected="false">Login</a>
                            </li>
                        </ul>
                        <div class="tab-content checkout">
                            <div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">

                                <div class="form-group">
                                    <!-- Người Nhận -->
                                    <input type="text" class="form-control" name="accepter" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                                </div>
                                <hr>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="phone" value="{{ Auth::user()->phone }}">
                                </div>

                                <!-- /row -->

                                <div class="form-group">
                                    <input type="text" class="form-control"  value="{{ Auth::user()->role == 1 ? 'Admin' : (Auth::user()->role == 2 ? 'Người dùng' : '') }}" disabled>
                                    <input type="hidden" name="account" value="{{ Auth::user()->id }}">
                                </div>



                                <hr>
                                <div class="form-group">
                                    <label class="container_check" id="other_addr">Other billing address
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div id="other_addr_c" class="pt-2">
                                    <div class="row no-gutters">
                                        <div class="col-6 form-group pr-1">
                                            <input type="text" class="form-control" placeholder="Name">
                                        </div>
                                        <div class="col-6 form-group pl-1">
                                            <input type="text" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Full Address">
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col-6 form-group pr-1">
                                            <input type="text" class="form-control" placeholder="City">
                                        </div>
                                        <div class="col-6 form-group pl-1">
                                            <input type="text" class="form-control" placeholder="Postal code">
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row no-gutters">
                                        <div class="col-md-12 form-group">
                                            <div class="custom-select-form">
                                                <select class="wide add_bottom_15" name="country" id="country_2">
                                                    <option value="" selected>Country</option>
                                                    <option value="Europe">Europe</option>
                                                    <option value="United states">United states</option>
                                                    <option value="Asia">Asia</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Telephone">
                                    </div>
                                </div>
                                <!-- /other_addr_c -->
                                <hr>
                            </div>
                            <!-- /tab_1 -->

                        </div>
                    </div>
                    <!-- /step -->
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="step middle payments">
                        <h3>2. Payment and Shipping</h3>
                        <ul>
                            <li>
                                <label class="container_radio">Credit Card<a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
                                    <input type="radio" name="payment_methods" checked value="Thẻ Tín Dụng">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_radio">Cash on delivery<a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
                                    <input type="radio" name="payment_methods" value="Thanh Toán Khi Nhận Hàng">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            
                            <li>
                                <label class="container_radio">Bank Transfer<a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
                                    <input type="radio" name="payment_methods" value="Chuyển Khoản Ngân Hàng">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                        <div class="payment_info d-none d-sm-block">
                            <figure><img src="img/cards_all.svg" alt=""></figure>
                            <p>Sensibus reformidans interpretaris sit ne, nec errem nostrum et, te nec meliore philosophia. At vix quidam periculis. Solet tritani ad pri, no iisque definitiones sea.</p>
                        </div>

                        <h6 class="pb-2">Shipping Method</h6>


                        <ul>
                            <li>
                                <label class="container_radio">Standard shipping<a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
                                    <input type="radio" name="shipping" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_radio">Express shipping<a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
                                    <input type="radio" name="shipping">
                                    <span class="checkmark"></span>
                                </label>
                            </li>

                        </ul>

                    </div>
                    <!-- /step -->

                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="step last">
                        <h3>3. Order Summary</h3>
                        <div class="box_general summary">
                            <ul>
                                @foreach($carts as $cart)
                                <li class="clearfix"><em>{{ $cart->qty }} x {{ $cart->name }}</em> <span>${{ $cart->price }}</span></li>
                                @endforeach
                            </ul>
                            <ul>
                                <li class="clearfix"><em><strong>Subtotal</strong></em> <span>${{ $subtotal }}</span></li>
                                <li class="clearfix"><em><strong>Shipping</strong></em> <span>$0</span></li>

                            </ul>
                            <div class="total clearfix">TOTAL <span>${{ $total }}</span></div>
                            <div class="form-group">
                                <label class="container_check">Register to the Newsletter.
                                    <input type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <input type="hidden" name="total_price" value="{{ $total }}">
                            <button type="submit" class="btn_1 full-width">Confirm and Pay</button>
                        </div>
                        <!-- /box_general -->
                    </div>
                    <!-- /step -->
                </div>
            </form>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
<!--/main-->

@endsection