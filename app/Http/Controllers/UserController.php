<?php

namespace App\Http\Controllers;

use App\Http\Requests\RateRequest;
use App\Interfaces\RatingInterface;
use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;
    protected $rateUserRepository;

    public function __construct(UserInterface $userRepository , RatingInterface $rateUserRepository)
    {
        $this->userRepository = $userRepository;
        $this->rateUserRepository = $rateUserRepository;}
        public function index()
        {
            $users = $this->userRepository->getUserWithBookCount();
            return view('Authors', compact('users'));
        }
    public function show($userId)
    {
        $user = $this->userRepository->getUserBooksWithRating($userId);
        dd($user->roles->pluck('role'));

        $authorRating = $this->userRepository->getAuthorAverageRating($userId);
        $authorRatingCount = $this->userRepository->getAuthorRatingCount($userId);
        $userReviewsCount = $this->userRepository->getUserReviewsCount($userId);
        return view('Author', compact('user', 'authorRating','authorRatingCount', 'userReviewsCount'));
    }
    
    public function rateAuthor(RateRequest $request, $authorId)
    {
        $data = $request->validated();
    
        $this->rateUserRepository->rateAuthor($authorId, $data['rating']);
    
        return back();
    }
    
}
