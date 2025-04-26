<?php

namespace App\Repositories;

use App\Interfaces\RatingInterface;
use App\Models\Book;
use App\Models\Rating;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RatingRepository implements RatingInterface
{
    public function createOrUpdateRating($userId, $reviewId, $rating)
    {
        $existingRating = Rating::where('user_id', $userId)
        ->where('rateable_id', $reviewId) //   
        ->where('rateable_type', \App\Models\Review::class)       
        ->first();

        if ($existingRating) {
            // تحديث التقييم إذا كان موجودًا
            $existingRating->rating = $rating;
            $existingRating->save();
        } else {
            // إنشاء تقييم جديد
            Rating::create([
                'user_id' => $userId,
                'rateable_id' => $reviewId, 
                'rateable_type' => \App\Models\Review::class, 
                'rating' => $rating,
            ]);
        }
    }
  
    public function rateBook( Book $book, array $data,$userId){
 
        $existing=Rating::where('user_id', $userId)
        ->where('rateable_id', $book->id)
        ->where('rateable_type','book')
        ->first();

        if(!$existing){
           return Rating::create([
                'user_id'=>$userId,
                'rateable_id'=>(string) $book->id,
                'rateable_type'=>Book::class,
                'rating'=>$data['rating'],
           ]);
    }
    return $existing;
        
}
public function rateAuthor($authorId, $rating)
{
    $userId = Auth::id();

    return Rating::updateOrCreate(
        [
            'user_id' => $userId,
            'rateable_id' => $authorId,
            'rateable_type' => User::class,
        ],
        [
            'rating' => $rating,
        ]
    );
}


}
