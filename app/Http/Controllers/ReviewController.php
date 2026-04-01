<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
  
    public function create()
    {
        return view('reviews_post');
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);


        Review::create([
            'user_id' => auth()->id(), 
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
        ]);

        return redirect()->back()->with('status', 'Review succesvol geplaatst!');
    }
}