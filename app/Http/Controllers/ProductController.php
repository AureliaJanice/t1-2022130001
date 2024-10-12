<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dump($request->all()); ngevalidasi data
        $validated = $request->validate([
            'product_name' => 'required | string | max:225',
            'description' => 'nullable | string | max:255',
            'retail_price' => 'required | numeric | min:0',
            'wholesale_price' => 'required | numeric | min:0.0|max:9999999|lte:retail_price',
            'origin' => 'required  | string | min:1',
            'quantity' => 'required | integer| min:0',
        ]);


        //simpen ke db
        if ($request->hasFile('product_image')) {
            $request->validate([
                'product_image' => ' image | mimes:jpeg,png,jpg,giF,svg | max:2048'
            ]);
            $imagePath = $request->file('product_image')->store('public/images');

            $validated['product_image'] = $imagePath;
        }

        // feedback data ny dh d simpen
        // dump($validated);
        Product::create([
            'product_name' => $validated['product_name'],
            'description' => $validated['description'],
            'retail_price' => $validated['retail_price'],
            'wholesale_price' => $validated['wholesale_price'],
            'origin' => $validated['origin'],
            'quantity' => $validated['quantity'] ,
            'product_image' => $validated['product_image']?? null
        ]);

        return redirect()->route('products.index')->with('success', 'Product added succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $countries = [
            'ID' => 'Indonesia',
            'CN' => 'China',
            'US' => 'United States',
            'UK' => 'United Kingdom',
            'MY' => 'Malaysia',
            'IN' => 'India',
            'JP' => 'Japan',
            'SG' => 'Singapore',
        ];

        $countryName = isset($countries[$product->origin]) ? $countries[$product->origin] : 'Unknown';

        return view('products.show', compact('product', 'countryName'));

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // dump($request->all()); ngevalidasi data
        $validated = $request->validate([
            'product_name' => 'required | string | max:225',
            'description' => 'nullable | string | max:255',
            'retail_price' => 'required | numeric | min:0.0 | max:9999999',
            'wholesale_price' => 'required | numeric | min:0.0 | max:9999999 | lte:retail_price',
            'origin' => 'required  | string | min:1',
            'quantity' => 'required | integer| min:0',
            'product_image' => ' image | mimes:jpeg,png,jpg,giF,svg | max:2048'
        ]);

        //simpen ke db
        if ($request->hasFile('product_image')) {
            $request->validate([
                'product_image' => ' image | mimes:jpeg,png,jpg,giF,svg | max:2048'
            ]);
            $imagePath = $request->file('product_image')->store('public/images');

            //hapus file yg ada
            if ($product->product_image){
                Storage::delete([$product->product_image]);
            }

            $validated['product_image'] = $imagePath;
        }


        $product->update([
            'product_name' => $validated['product_name'],
            'description' => $validated['description'],
            'retail_price' => $validated['retail_price'],
            'wholesale_price' => $validated['wholesale_price'],
            'origin' => $validated['origin'],
            'quantity' => $validated['quantity'] ,
            'product_image' => $validated['product_image']?? $product->product_image,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->product_image) {
            Storage::delete($product->product_image);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted succesfully.');
    }
}
