<?php

namespace App\Interfaces;

use App\Models\Book;

interface RatingInterface
{

    public function createOrUpdateRating($userId, $reviewId, $rating);
    public function rateBook( Book $book, array $data,$userId);
    public function rateAuthor( $authorId, $rating);
    

}