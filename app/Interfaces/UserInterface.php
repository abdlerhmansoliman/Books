<?php

namespace App\Interfaces;

use App\Models\User;
use Illuminate\Http\UploadedFile;

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
    public function updateUserProfile(User $user, array $data, ?UploadedFile $image = null);
}