<?php


namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::query()->orderBy('id')->get();
        return view('admin.products', ['products' => $products]);
    }

    public function create()
    {
        return view('admin.productCreate');
    }

    public function edit(Product $product)
    {
        return view('admin.productEdit', ['product' => $product]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        if (isset($_FILES ['image']['tmp_name'])) {
            $product->loadFile($_FILES ['image']['tmp_name']);
        }

        $product->save();
        return redirect()->route('admin.products');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);

        $product = Product::query()->find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        if (!empty($_FILES ['image']['tmp_name'])) {
            $product->deleteImage($product->image);
            $product->loadFile($_FILES ['image']['tmp_name']);
        }

        $product->save();
        return redirect()->route('admin.products');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.products');
    }

}
