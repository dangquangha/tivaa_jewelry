<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Provider;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(['category', 'provider']);
        $categories = Category::all();
        $providers = Provider::all();

        if ($request->name) {
            $products->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->code) {
            $products->where('code', 'like', '%' . $request->code . '%');
        }

        if ($request->id) {
            $products->where('id', $request->id);
        }

        if ($request->category_id) {
            $products->where('category_id', $request->category_id);
        }

        if ($request->provider_id) {
            $products->where('provider_id', $request->provider_id);
        }
        
        $products = $products->orderBy('id', 'desc')->paginate(10);

        $viewData = [
            'products' => $products,
            'categories' => $categories,
            'providers' => $providers
        ];

        return view('pages.products.index')->with($viewData);
    }

    public function create()
    {
        $categories = Category::all();
        $providers = Provider::all();

        $viewData = [
            'categories' => $categories,
            'providers' => $providers
        ];

        return view('pages.products.create')->with($viewData);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required',
            'code' => 'unique:products'
        ]);

        if (!$request->code) {
            $category = Category::where('id', $request->category)->first()->code;
            if (!$category) {
                $request->session()->put('fail', true);
                return redirect()->route('get.products');
            }
            $preCode = $category->code;
            $countProduct = Product::where('category_id', $request->category)->count() + 1;
            $request->code = $preCode + $countProduct;
        }

        Product::create([
            'name' => $request->name,
            'code' => $request->code,
            'image' => null,
            'category_id' => $request->category,
            'provider_id' => $request->provider,
            'price_buy' => $request->price_buy,
            'price_sale' => $request->price_sale,
            'note' => $request->note
        ]);

        $request->session()->put('success', true);

        return redirect()->route('get.products');
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();

        if (!$product) {
            return redirect()->route('get.products');
        }

        $categories = Category::all();
        $providers = Provider::all();

        $viewData = [
            'product' => $product,
            'categories' => $categories,
            'providers' => $providers
        ];

        return view('pages.products.edit')->with($viewData);
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'category' => 'required',
            'code' => 'unique:products,code,' . $id
        ]);

        if (!$request->code) {
            $category = Category::where('id', $request->category)->first();
            if (!$category) {
                $request->session()->put('fail', true);
                return redirect()->route('get.products');
            }
            $preCode = $category->code;
            $countProduct = Product::where('category_id', $request->category)->count() + 1;
            $request->code = $preCode + $countProduct;
        }

        Product::where('id', $id)->update([
            'name' => $request->name,
            'code' => $request->code,
            'image' => null,
            'category_id' => $request->category,
            'provider_id' => $request->provider,
            'price_buy' => $request->price_buy,
            'price_sale' => $request->price_sale,
            'note' => $request->note
        ]);

        $request->session()->put('success', true);

        return redirect()->route('get.products');
    }

    public function delete($id, Request $request)
    {
        Product::where('id', $id)->delete();

        $request->session()->put('success', true);

        return redirect()->route('get.products');
    }
}
