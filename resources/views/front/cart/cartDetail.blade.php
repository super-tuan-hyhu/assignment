@extends('front.layout.master')
@section('title', 'Shop')
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
            <h1>Cart page</h1>
        </div>
            @if(Cart::count() <= 0)
                <h3>Bạn Chưa Có Sản Phẩm Nào!!!!!</h3>
                <a href="{{  route('homeUser')}}"><button class="btn btn-primary">Tiếp tục mua hàng</button></a>
                
            @else
            <!-- /page_header -->
                <table class="table table-striped cart-list">
                    <thead>
                        <tr>
                            <th>
                                Product
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>
                                Subtotal
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carts as $cart)
                        <tr>
                            <td>
                                <div class="thumb_cart">
                                    <img src="../assetss/img/product/{{ $cart->options->image }}" data-src="../assetss/img/product/{{ $cart->options->image }}" class="lazy">
                                </div>
                                <span class="item_cart">{{ $cart->name }}</span>
                            </td>
                            <td>
                                <strong>${{ $cart->price }}</strong>
                            </td>
                            <td>
                                <div class="numbers-row">
                                    <input type="text" value="{{ $cart->qty }}" id="quantity_1" class="qty2" name="quantity_1">
                                    <div class="inc button_inc">+</div>
                                    <div class="dec button_inc">-</div>
                                </div>
                            </td>
                            <td>
                                <strong>${{ $cart->price }}</strong>
                            </td>
                            <td class="options">
                                <a href="{{ route('home.cart.delete', $cart->rowId) }}" onclick="return confirm('Bạn có muốn xóa không ??')"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="row add_top_30 flex-sm-row-reverse cart_actions">
                    <div class="col-sm-4 text-end">
                        <button type="button" class="btn_1 gray">Update Cart</button>
                    </div>
                    <div class="col-sm-8">
                        <div class="apply-coupon">
                            <div class="form-group">
                                <div class="row g-2">
                                    <div class="col-md-6"><input type="text" name="coupon-code" value="" placeholder="Promo code" class="form-control"></div>
                                    <div class="col-md-4"><button type="button" class="btn_1 outline">Apply Coupon</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- /cart_actions -->
            @endif
        </div>
        <!-- /container -->

        <div class="box_cart">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <ul>
                        <li>
                            <span>Subtotal</span> ${{ $subtotal }}
                        </li>

                        <li>
                            <span>Total</span> ${{ $total }}
                        </li>
                    </ul>
                    <a href="{{ route('home.cart.checkOut') }}" class="btn_1 full-width cart">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /box_cart -->

</main>

@endsection