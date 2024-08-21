<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function listCart(){
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        return view('front.cart.cartDetail', compact('carts', 'total', 'subtotal'));
    }

    public function cartProduct(Request $request ,$cartID){
        $product = Product::find($cartID);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price_new ?? $product->price_old,
            'qty' => '1',
            
            'options' => [
                'image' => $product->image,
                'size' => $request->input('size', 'S'),
                'color' => $request->input('color', 'Đen'),
            ]
        ]);
        // dd(Cart::content());
        return back();
    }

    public function checkOut(){
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        return view('front.cart.checkOut', compact('carts', 'total', 'subtotal'));
    }

    public function order(Request $request){
        $data = $request->all();

        // Thêm giỏ hàng 
        $order = Order::create($data);

        // thêm vào giỏ hàng chi tiết
        $carts = Cart::content();

        foreach($carts as $cart){
            $dataDetail = [
                'product_id' => $cart->id,
                'order_id' => $order->id_order,
                'name_product' => $cart->name,
                'price_product' => $cart->price,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'number_product' => $cart->qty
            ];

            $orderDetail = OrderDetail::create($dataDetail);
        }

        return redirect()->route('home.cart.confirm');
    }


    public function delete(Request $request,$rowId){
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function confirm(){
        return view('front.cart.confirm');
    }
}
