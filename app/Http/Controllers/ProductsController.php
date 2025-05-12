<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $products = Product::with('images', 'category')->get();

        $groupedProducts = $products->groupBy('category_id');

        return view('pages.products.index', compact('categories', 'groupedProducts'));
    }

    public function show($id)
    {
        $product = Product::with('images', 'category')->findOrFail($id);

        return view('pages.products.show', compact('product'));
    }
}

