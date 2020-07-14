<?php


namespace App\Http\Controllers;


use App\Order;
use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CartController
{
    public function index()
    {
        $order = User::currentOrder();

        if (!empty($order)){
            $currentProducts = Order::find($order->id)->products;

            return view('cart', [
                'title' => 'Корзина – ГеймсМаркет',
                'products' => $currentProducts,
                'order' => $order,
            ]);
        } else {
            return view('cart', [
                'title' => 'Корзина – ГеймсМаркет',
                'order' => [],
                'products' => [],
            ]);
        }
    }

    public function submit()
    {
        $order = User::currentOrder();
        Order::sendEmail($order->id);
        $order->order_status = 1;
        $order->save();

        return 'Ваш заказ создан, мы обработаем его в ближайшее время. Спасибо!
        <br><br>
        <a href="/">Вернуться на главную</a>';
    }
}
