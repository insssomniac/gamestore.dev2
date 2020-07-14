<?php


namespace App\Http\Controllers;

use App\Category;
use App\Product;

class ProductsController extends Controller
{
    public function productView(int $id)
    {
        $product = Product::find($id);

        $title = $product->name . ' – ГеймсМаркет';

        return view('product', [
            'title' => $title,
            'product' => $product,
        ]);
    }

}
