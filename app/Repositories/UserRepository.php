<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\Book;
use App\Models\Download;
use App\Models\Rating;
use App\Models\Review;
use App\Models\User;

class UserRepository implements UserInterface
{
    public function getUserWithBookCount()
    {
        return User::withCount('books')
        ->withCount('ratings')
        ->withAvg('ratings', 'rating')
        ->get();
    }
    public function getUserBooksWithRating($userId){
        return User::with(['books' => function ($query) {
            $query->with('ratings');
        }])->findOrFail($userId);
    }
    public function getAuthorAverageRating(int $authorId){
        return Rating::where('rateable_type', User::class)
        ->where('rateable_id', $authorId)
        ->avg('rating');

    }
    public function getAuthorRatingCount(int $authorId)
    {
        return Rating::where('rateable_type', User::class)
                    ->where('rateable_id', $authorId)
                    ->count();
    }
    public function getUserReviewsCount(int $userId)
    {
        return Review::where('user_id', $userId)->count();
    }
    public function getBooksCount($userId){
        return User::findOrFail( $userId)->books()->count();
    }
    public function getDownloadsCount ($userId){
        return Download::where('user_id', $userId)->count();
    }
    public function getBooks($userId)
{
    return User::findOrFail($userId)->books()->latest()->get();
}

public function getReviews($userId)
{
    return User::findOrFail($userId)->reviews()->latest()->get();
}

public function getDownloads($userId)
{
    return  Download::with('book')->where('user_id', $userId)->get();
}

}