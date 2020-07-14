<?php

namespace App\Http\Controllers\Api\V1;

use App\Category;
use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function one(Product $product)
    {
        return $product;
    }

    public function category(Category $category)
    {
        return $category->products;
    }


}
