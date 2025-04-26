<?php

namespace App\Http\Controllers;

use App\Interfaces\BookMarkInterface;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    protected $bookmarkRepository;
    public function __construct(BookMarkInterface $bookmark_repository){
        $this->bookmarkRepository=$bookmark_repository;
    }
    public function add($book){
        $user = Auth::user();
        $add=$this->bookmarkRepository->addBookmark($user, $book);
        return back();
    }
}
