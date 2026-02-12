<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use App\Models\Vendor;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function reviewslist()
    {
        $data = Review::get();
        $vendor = Vendor::where('status', 1)->get();
        return view('reviews.index', compact('data', 'vendor'));
    }

    public function insertreviews(ReviewRequest $request)
    {
        try {
            if ($request->id) {
                $reviews = Review::where('id', $request->id)->first();
            } else {
                $reviews = new Review();
            }

            if ($request->hasFile('profile')) {
                if ($reviews->profile && file_exists(public_path('reviews/' . $reviews->profile))) {
                    unlink(public_path('reviews/' . $reviews->profile));
                }
                $imageName = time() . rand(100, 999) . '.' . $request->profile->extension();
                $request->profile->move(public_path('reviews'), $imageName);
                $reviews->profile = $imageName;
            }

            $reviews->student_name = $request?->student_name;
            $reviews->vendor_id = $request?->vendor_id;
            $reviews->course_name = $request?->course_name;
            $reviews->vendor_user_id = $request?->vendor_user_id;
            $reviews->rating = $request?->rating;
            $reviews->review = $request?->review;
            $reviews->save();
            if ($request->id) {
                return redirect()->back()->with('success', 'Review add successfully!');
            } else {
                return redirect()->back()->with('success', 'Review updated successfully!');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function reviewsedit(Request $request)
    {
        if ($request->id) {
            $reviews = Review::where('id', $request->id)->first();
            return response()->json($reviews);

        } else {
            return response()->json('Something went wrong');
        }
    }

    public function deletereviews(Request $request)
    {
        $review = Review::where('id', $request?->id)->delete();
        if ($review) {
            return redirect()->back()->with('success', 'Review deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}
