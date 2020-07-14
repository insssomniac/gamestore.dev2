<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use function foo\func;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id', 'order_status', 'total_price'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'orders_products');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function createOrder ($productId)
    {
        $product = Product::find($productId);

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'order_status' => 0,
            'total_price' => $product->price,
        ]);

        DB::table('orders_products')->insert(
            array('order_id' => $order->id, 'product_id' => $productId),
        );
    }

    public static function updateOrder (int $productId, int $orderId)
    {
        $product = Product::find($productId);

        $order = Order::find($orderId);
        $order->total_price += $product->price;
        $order->save();

        DB::table('orders_products')->insert(
            array('order_id' => $orderId, 'product_id' => $productId)
        );
    }

    public static function sendEmail($orderId)
    {
        $emails = DB::table('admin_emails')->get();
        $emails = Collection::unwrap($emails);

        $mails = [];
        foreach ($emails as $email) {
            $mails[] = $email->email;
        }

        Mail::raw('New oder waits for your attention! Order ID: ' . $orderId, function ($message) use ($mails) {
            $message->to($mails);
            $message->subject('New order');
        });
    }

}
