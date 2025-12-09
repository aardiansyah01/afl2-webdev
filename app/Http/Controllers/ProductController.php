<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort   = $request->input('sort', 'name');
        $order  = $request->input('order', 'asc');

        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');

        $products = Product::query();

        // Price Range Filter
        if ($min_price !== null) {
            $products->where('price', '>=', $min_price);
        }

        if ($max_price !== null) {
            $products->where('price', '<=', $max_price);
        }

        // Sorting
        $products->orderBy($sort, $order);

        $products = $products->get();

        return view('products.list', compact('products', 'search', 'sort', 'order', 'min_price', 'max_price'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function create()
    {
        $categories = \App\Models\Category::pluck('name', 'id');
        return view('products.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string',
            'price'       => 'required|numeric',
            'description' => 'nullable|string',
            'color'       => 'required|string',
            'size'        => 'required|string',
            'category_id' => 'required',
            'image'       => 'nullable|string',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product added!');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = \App\Models\Category::pluck('name', 'id');

        return view('products.form', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'        => 'required|string',
            'price'       => 'required|numeric',
            'description' => 'nullable|string',
            'color'       => 'required|string',
            'size'        => 'required|string',
            'category_id' => 'required',
            'image'       => 'nullable|string',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Updated successfully!');
    }

}





