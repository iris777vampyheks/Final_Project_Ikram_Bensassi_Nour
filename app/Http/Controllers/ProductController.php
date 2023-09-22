<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
    
        return view('products.index', compact('products'));
    }
    
    public function create()
    {
        // Show the create form
        return view('products.create');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0.01',
        ]);
    
        Product::create($validatedData);
    
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    
    
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
    
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
    
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0.01',
        ]);
    
        $product->update($validatedData);
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }
    
    
    public function destroy(Product $product)
{
    $product->delete();

    return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
}

    
    

}


