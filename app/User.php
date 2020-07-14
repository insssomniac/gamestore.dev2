<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function setAdmin()
    {

    }

    public static function products($userId)
    {
        $orders = User::find($userId)->orders;
        $ordersArray = [];
        $products = DB::table('orders_products')->whereIn('order_id', $orders);
    }

    public static function currentOrder() {
        $order = Order::whereRaw('user_id = ? and order_status = 0', [Auth::id()])->first();
        return $order;
    }

    public function currentProductsCount()
    {
        $order = Order::whereRaw('user_id = ? and order_status = 0', [$this->id])->first();
        if (!empty($order)) {
            $products = $order->products;
            $count = $products->count();
            return $count;
        } else {
            return 0;
        }
    }

}
