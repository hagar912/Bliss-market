<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductControl;
use App\Http\Controllers\CategoryControl;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

// Make the category ID parameter optional.
Route::get('/products/{catid?}',[CategoryControl::class, 'getProductsByCategory'])->name('products.byCategory');

Route::get('/category', [CategoryControl::class, 'getAllCategorywithProducts'])->name('categories.withProducts');

Route::get('/addproduct', [ProductControl::class, 'addProductView'])->name('product.add');

Route::get('/editproduct/{id?}',[ProductControl::class, 'editProductView'])->name('product.edit');

Route::get('/removeproduct/{id?}', [ProductControl::class, 'removeProduct'])->name('product.remove');

Route::Post('/storeproduct',[ProductControl::class, 'saveProduct'])->name('product.store');

Route::get('/addreview', [ReviewController::class , 'addReviewView'])->name('review.add');

Route::get('/reviews', [ReviewController::class , 'allReviews'])->name('reviews.all');

Route::post('/storereview', [ReviewController::class , 'storeReview'])->name('review.store');

Route::get('/searchproduct', [ProductControl::class , 'searchProduct'])->name('product.search');
