<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products =Product::where('stock', '=', 1)->paginate(12);

        return view('home.index')->with('products', $products);
    }


}
