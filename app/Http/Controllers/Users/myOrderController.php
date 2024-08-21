<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class myOrderController extends Controller
{
    public function listOrder(){
        $orders = Order::where('account', Auth::user()->id)->orderBy('id_order', 'desc')->get();
        return view('front.myOrder.trackOrder', compact('orders'));
    }

    public function orderDetail($orderID){
        $order = Order::find($orderID);
        $orderDetail = OrderDetail::with('orderr')->with('product')->where('order_id', $orderID)->orderBy('id_detail', 'desc')->get();
        return view('front.myOrder.orderDetaill', compact('order', 'orderDetail'));
    }

    public function updateOrder(Request $request, $orderID){
        $order = Order::find($orderID);
    
        if($order){
            $order->status = 'Đã Nhận Hàng';
            $order->save();
            return redirect()->back()->with([
                'message' => 'Cập Nhật Thành Công'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'Đơn Hàng Không Tồn Tại'
            ]);
        }
    }
}
