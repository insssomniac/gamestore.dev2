<?php


namespace App\Http\Controllers;


use App\Order;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;

class OrdersController
{
    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders()->where('order_status', '=', 2)->paginate(3);
        if (!empty($orders)){
            return view('orders', [
                'title' => 'Заказы – ГеймсМаркет',
                'orders' => $orders,
            ]);
        } else {
            return view('orders', [
                'title' => 'Заказы – ГеймсМаркет',
                'orders' => [],
            ]);
        }

    }

    public function buy(int $productId)
    {
        $user = Auth::user();
        if (!empty($user)) {
            $order = User::currentOrder();

            if (empty($order)) {
                Order::createOrder($productId);
            } else {
                Order::updateOrder($productId, $order->id);
            }

            return redirect()->back();

        } else {
            return 'Пожалуйста, войдите на сайт, чтобы делать покупки';
        }
    }

}
