<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductControl extends Controller
{
    // Show add product view.
    public function addProductView()
    {
        $categories = Category::all();
        return view('Products.addproduct', ['categories' => $categories]);
    }

    // Show edit product view.
    public function editProductView($id = null){
        if($id){
            $categories = Category::all();
            $editedProduct = Product::findOrFail($id);
            return view('Products.editproduct', ['product' => $editedProduct, 'categories' => $categories]);
        } else{
            return redirect('/addproduct');
        }
    }

    // Save or update product.
    public function saveProduct(Request $request)
    {
        if($request->has('id')){
            // Update existing product.
            $request->validate([
                'id' => 'required|exists:products,id',
                'name' => 'required|string|max:100',
                'price' => 'required|numeric',
                'quantity' => 'required|integer',
                'description' => 'nullable|string',
                'category_id' => 'required|exists:categories,id',
                'photo' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,gif,svg',
            ]);
            $existingProduct = Product::find($request->id);
            $existingProduct->name = $request->name;
            $existingProduct->price = $request->price;
            $existingProduct->quantity = $request->quantity;
            $existingProduct->description = $request->description;
            $existingProduct->category_id = $request->category_id;
            if($request->photo){
                $image_path = $request->photo->move('assets/img/uploads', Str::uuid()->tostring() . '-' . $request->photo->getClientOriginalName());
                $existingProduct->image_path = $image_path;
            }
            $existingProduct->save();

            return redirect('/products')->with('success', 'Product updated successfully!');
        }else{
            // Create new product.
            $request->validate([
                'name' => 'required|string|max:100|unique:products',
                'price' => 'required|numeric',
                'quantity' => 'required|integer',
                'description' => 'nullable|string',
                'category_id' => 'required|exists:categories,id',
                'photo' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,gif,svg',
            ]);
            $image_path = $request->photo->move('assets/img/uploads', Str::uuid()->tostring() . '-' . $request->photo->getClientOriginalName());
            $newProduct = new Product();
            $newProduct->name = $request->name;
            $newProduct->price = $request->price;
            $newProduct->quantity = $request->quantity;
            $newProduct->description = $request->description;
            $newProduct->category_id = $request->category_id;
            $newProduct->image_path = $image_path;
            $newProduct->save();

            return redirect('/products')->with('success', 'Product added successfully!');
        }
        
    }

    // Remove product by ID.
    public function removeProduct($id = null){
        if($id){
            $deleted_product = Product::find($id);
            if($deleted_product){
                $deleted_product->delete();
                return redirect('/products')->with('success', 'Product removed successfully!');
            }
        } else{
            abort(403, 'Please provide a valid product ID to remove.');
        }
    }

    // Search products by name.
    public function searchProduct(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $searchTerm = $request->name;
        $products = Product::where('name', 'LIKE', '%' . $searchTerm . '%')->get();

        return view('products', ['products' => $products]);
    }


}
