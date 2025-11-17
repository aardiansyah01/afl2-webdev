<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // List produk
    public function index()
    {
        $products = Product::limit(1000)->get();
        return view('products.list', compact('products'));
    }

    // buat produk
    public function create()
    {
        return view('products.form');
    }

    // untuk menyimpan produk baru
    public function store(Request $request)
    {
        Product::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'image'       => $request->image, // hanya nama file
        ]);

        return redirect()->route('products');
    }

    //form edit
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.form', compact('product'));
    }

    // update produk
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'image'       => $request->image,
        ]);

        return redirect()->route('products');
    }

    //poduk tampilan
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }
}
