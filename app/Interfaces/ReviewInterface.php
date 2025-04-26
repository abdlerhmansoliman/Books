<?php

namespace App\Interfaces;

use App\Models\Book;

interface ReviewInterface
{
    public function createReview(Book $book, array $data, int $userId);



}
