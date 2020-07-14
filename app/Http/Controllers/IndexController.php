<?php


namespace App\Http\Controllers;


use App\Category;
use App\Product;

class IndexController
{
    public function index()
    {
        $products = Product::query()->orderBy('created_at', 'desc')->paginate(6);
        return view('index', ['title' => 'Главная – ГеймсМаркет', 'products' => $products]);
    }
}
