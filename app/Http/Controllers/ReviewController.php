<?php

namespace App\Http\Controllers;

use App\Http\Requests\RateRequest;
use App\Models\Review;
use App\Repositories\RatingRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    protected $ratingRepository;

    public function __construct(RatingRepository $ratingRepository)
    {
        $this->ratingRepository = $ratingRepository;
    }
    public function rateReview(RateRequest $request ,$reviewId)
    {
        
        $review=Review::findOrFail($reviewId);
       
        $this->ratingRepository->createOrUpdateRating(Auth::id(), $reviewId, $request->rating);

        return redirect()->back();
    }
}
