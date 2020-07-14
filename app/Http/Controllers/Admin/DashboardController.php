<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $ordersToProcess = Order::where('order_status', '1')->get();
        $ordersDone = Order::where('order_status', '2')->take(10)->get();
        $ordersCanceled = Order::where('order_status', '3')->take(10)->get();

        return view('admin.dashboard', [
            'ordersToProcess' => $ordersToProcess,
            'ordersDone' => $ordersDone,
            'ordersCanceled' => $ordersCanceled,
        ]);
    }

    public function processOrder($id)
    {
        $order = Order::find($id);
        $order->order_status = 2;
        $order->save();

        return redirect()->back();
    }

    public function cancelOrder($id)
    {
        $order = Order::find($id);
        $order->order_status = 3;
        $order->save();

        return redirect()->back();
    }


}
