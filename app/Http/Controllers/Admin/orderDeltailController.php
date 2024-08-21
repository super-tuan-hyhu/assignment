<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class orderDeltailController extends Controller
{
    public function order(){
        $order = Order::orderBy('id_order', 'asc')->paginate(5);
        return view('admin.order.listOrder', compact('order'));
    }

    public function orderDetail($orderID){
        $order = Order::find($orderID);
        $orderDetail = OrderDetail::with('orderr')
                                    ->with('product')
                                    ->where('order_id', $orderID)
                                    ->orderBy('id_detail', 'desc')
                                    ->get();
        return view('admin.order.orderDetail', compact('order', 'orderDetail'));
    }

    public function updateOrder(Request $request, $orderID){
        $order = Order::find($orderID);

        if ($order) {
            switch ($order->status) {
                case 'Chưa có thông tin':
                    $order->status = 'Chờ Xác Nhận Đơn Hàng';
                    break;
                case 'Chờ Xác Nhận Đơn Hàng':
                    $order->status = 'Đang Đóng Hàng Hóa';
                    break;
                case 'Đang Đóng Hàng Hóa':
                    $order->status = 'Đang Giao Hàng';
                    break;
                case 'Đang Giao Hàng':
                    $order->status = 'Chờ Xác Nhận Thanh Toán';
                    break;
                case 'Chờ Xác Nhận Thanh Toán':
                    $order->status = 'Giao Thành Công';
                    break;
                default:
                    $order->status = 'Chờ Xác Nhận Đơn Hàng';
                    break;
            }
            
            $order->save();
            return redirect()->back()->with([
                'message' => 'Cập Nhật Thành Công'
            ]);
        }
        else{
            return redirect()->back()->with([
                'message' => 'Cập Nhật Không Thành Công'
            ]);
        }
    }
}
