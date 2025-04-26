<?php

namespace App\Repositories;

use App\interfaces\BookmarkInterface;
use App\Models\Book;
use App\Models\Bookmark;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BookmarkRepository implements BookmarkInterface
{
    // addbookmark
    public function addBookmark(User $user, $book)
    {
        // Logic to add a bookmark for the user and book
        $book=Book::findOrFail($book);
        if($book->bookmarkedBy($user,$book)){
            return false;
        }

         Bookmark::create([
            'user_id' => $user->id,
            'book_id' => $book->id
        ]);
        return true;
    }
    // remove bookmark
    public function removeBookmarl(User $user, $book)
    {
        // Logic to remove a bookmark for the user and book
        return Bookmark::where('user_id', $user->id)
            ->where('book_id', $book->id)
            ->delete();
    }
    // show bookmark books
    public function getUserBookmarks(User $user)
    {
        return $user->bookmarks()->with('book')->get();
    }
}
