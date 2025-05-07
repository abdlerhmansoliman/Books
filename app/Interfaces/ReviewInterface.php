<?php

namespace App\Interfaces;

use App\Models\Book;
use App\Models\Review;

interface ReviewInterface
{
    public function index();
    public function createReview(Book $book, array $data, int $userId);
    public function destroy(Review $review);


}
