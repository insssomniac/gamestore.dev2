<?php


namespace App\Http\Controllers;

use App\Category;

class CategoryController
{
    public function index(Category $category)
    {
        $categoryName = $category->name;
        $categoryProducts = $category->products()->paginate(6);

        return view('category', [
            'title' => 'Игры в разделе ' . $categoryName . ' – ГеймсМаркет',
            'categoryName' => $categoryName,
            'categoryProducts' => $categoryProducts,
        ]);
    }

}
