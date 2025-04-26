<?php

namespace App\Interfaces;


interface UserInterface
{

    public function getUserWithBookCount();
    public function getUserBooksWithRating($userId);
    public function getAuthorAverageRating(int $authorId);
    public function getUserReviewsCount(int $userId);
    public function getAuthorRatingCount(int $authorId);
    public function getBooksCount($userId);
    public function getDownloadsCount($userId);
    public function getBooks($userId);
    public function getReviews($userId);
    public function getDownloads($userId);
}