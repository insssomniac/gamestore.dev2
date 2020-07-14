<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::query()->orderBy('name', 'ASC')->get();
        return view('admin.categories', ['categories' => $categories]);
    }

    public function create()
    {
        return view('admin.categoryCreate');
    }

    public function edit(Category $category)
    {
        return view('admin.categoryEdit', ['category' => $category]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('admin.categories');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $category = Category::query()->find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('admin.categories');
    }

    public function delete($id)
    {
        Category::destroy($id);
        return redirect()->route('admin.categories');
    }

}
