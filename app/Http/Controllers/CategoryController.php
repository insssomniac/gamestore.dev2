<?php


namespace App\Http\Controllers;

use App\Category;

class CategoryController
{
    public function index(int $category)
    {
        $categoryName = Category::find($category)->name;
        $categoryProducts = Category::find($category)->products()->paginate(6);

        return view('category', [
            'title' => 'Игры в разделе ' . $categoryName . ' – ГеймсМаркет',
            'categoryName' => $categoryName,
            'categoryProducts' => $categoryProducts,
        ]);
    }

}
