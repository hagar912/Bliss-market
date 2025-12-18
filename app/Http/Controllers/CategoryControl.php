<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CategoryControl extends Controller
{
    // Get all categories.
    public function getProductsByCategory($catid = null)
    {
        if (!$catid) {
            $products = Product::all();
        } else {
            $products = Product::where('category_id', $catid)->get();
        }
        $categories = Category::has('products')->get();
        return view('products', ['products' => $products, 'categories' => $categories]);
    }

    // Get categories for categories page.
    public function getAllCategorywithProducts () {
        $categories = Category::has('products')->get();
        $products = Product::all();
        return view('categories', ['categories' => $categories, 'products' => $products]);
    }
}
