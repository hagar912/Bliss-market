<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Review;


class ReviewController extends Controller
{

    public function addReviewView()
    {
        return view('Reviews.addreview');
    }

    public function allReviews(){
        $reviews = Review::all();
        return View('Reviews.allreviews', compact('reviews'));
    }

    public function storeReview(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'string|max:20',
            'role' => 'required|string|max:100',
            'message' => 'required|string',
        ]);

        $new_review = new Review();
        $new_review->name = $request->name;
        $new_review->email = $request->email;
        $new_review->phone = $request->phone;
        $new_review->role = $request->role;
        $new_review->message = $request->message;
        $new_review->save();
        return redirect('/reviews')->with('success', 'Review submitted successfully!');
        
    }
}