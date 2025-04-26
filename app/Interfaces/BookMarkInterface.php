<?php

namespace App\Interfaces;

use App\Models\User;

interface BookMarkInterface
{
    public function addBookmark(User $user, $bookId);
    public function removeBookmarl(User $user, $bookId);
    public function getUserBookmarks(User $user);
}
