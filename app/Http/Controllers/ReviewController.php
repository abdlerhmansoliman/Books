<?php

namespace App\Http\Controllers;

use App\Http\Requests\RateRequest;
use App\Interfaces\ReviewInterface;
use App\Models\Review;
use App\Repositories\RatingRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    protected $ratingRepository;
    protected $reviewRepo;
    public function __construct(RatingRepository $ratingRepository, ReviewInterface $reviewRepo)
    {
        $this->ratingRepository = $ratingRepository;
        $this->reviewRepo=$reviewRepo;
    }
    public function index(){
        $reviews=$this->reviewRepo->index();
        return view('admin.reviews',compact('reviews'));
    }
    public function rateReview(RateRequest $request ,$reviewId)
    {
        
        $review=Review::findOrFail($reviewId);
       
        $this->ratingRepository->createOrUpdateRating(Auth::id(), $reviewId, $request->rating);

        return redirect()->back();
    }
    public function destroy(Review $review){
        $this->reviewRepo->destroy($review);
        return redirect()->back();
    }
}
