<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_quantity = Product::sum('quantity');

        $most_expensive_product = Product::orderBy('retail_price', 'desc')->first();

        $most_stocked_product = Product::orderBy('quantity', 'desc')->first();

        $products = Product::all();

        //menampikan tabel
        return view('home', compact('total_quantity', 'most_expensive_product', 'most_stocked_product', 'products'));

        return view('home', compact('product_name'));
    }

    // public function getProduct($id, $serial_number = -1)
    // {
    //     return view('product-detail', compact('id','serial_number'));
    // }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'prduct_name' => 'required|min:3'
    //     ]);

    //     return $request->product_name;
    // }
}
