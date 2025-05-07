<?php

namespace App\Repositories;

use App\Interfaces\ReviewInterface;
use App\Models\Book;
use App\Models\Review;


class ReviewRepository implements ReviewInterface
{
    public function index(){
        return Review::all();
    }
    public function createReview(Book $book, array $data, int $userId){
        $review=Review::create([
            'book_id'=>$book->id,
            'user_id'=>$userId,
            'review'=>$data['review'],
        ]);
    }
    public function destroy(Review $review){
        return $review->delete();
    }

    }

