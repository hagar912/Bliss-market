<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    $categories =  DB::table('categories')->get();
    return view('welcome', ['categories' => $categories]);
});

Route::get('/products/{catid?}', function ($catid = null) {
    if (!empty($catid)) {
        $products = DB::table('products')->where('category_id', $catid)->get();
    } else {
        $products = DB::table(table: 'products')->get();
    }
    $categories = DB::table('categories')->get();
    return view('products', ['products' => $products, 'categories' => $categories]);
});
