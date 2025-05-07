<?php

namespace App\Interfaces;

use App\Models\Book;
use App\Models\User;

interface DashboardInterface
{

    public function reviewsCount();
    public function readCount();
    public function getRoles();
    public function getStatues();
    public function update(User $user, array $data);
    public function updateBook(Book $book ,array $data);
    public function getRequest();
    public function updatStatus($bookId ,$status);
    public function countPendingRequests();

}
