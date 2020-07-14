<?php


namespace App\Http\Controllers;

use App\Category;
use App\Product;

class ProductsController extends Controller
{
    public function productView(Product $product)
    {
        $title = $product->name . ' – ГеймсМаркет';

        return view('product', [
            'title' => $title,
            'product' => $product,
        ]);
    }

}
