<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = new Category();

        if ($request->name) {
            $categories = $categories->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->id) {
            $categories = $categories->where('id', $request->id);
        }
        
        $categories = $categories->orderBy('id', 'desc')->paginate(10);
        $viewData = [
            'categories' => $categories
        ];

        return view('pages.categories.index')->with($viewData);
    }

    public function create()
    {
        return view('pages.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        Category::create([
            'name' => $request->name,
            'code' => $request->code
        ]);

        $request->session()->put('success', true);

        return redirect()->route('get.categories');
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->first();

        if (!$category) {
            return redirect()->route('get.categories');
        }

        $viewData = [
            'category' => $category
        ];

        return view('pages.categories.edit')->with($viewData);
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        Category::where('id', $id)->update([
            'name' => $request->name,
            'code' => $request->code
        ]);

        $request->session()->put('success', true);
        
        return redirect()->route('get.categories');
    }

    public function delete($id, Request $request)
    {
        Category::where('id', $id)->delete();

        $request->session()->put('success', true);

        return redirect()->route('get.categories');
    }
}
