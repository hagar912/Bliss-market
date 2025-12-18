<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Review;

class HomeController extends Controller
{
    // Show home page
    public function index(){
        return view('welcome', [
            'categories' => $this->getCategories(),
            'products'   => $this->getProducts(),
            'reviews'    => $this->getReviews(),
        ]);
    }

    private function getCategories(){
        return Category::has('products')->get();
    }

    private function getProducts(){
        return Product::all();
    }

    private function getReviews(){
        return Review::latest()->get();
    }

}
