<?php

namespace App\Http\Controllers;

use App\interfaces\bookInterface;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    protected $bookInterface;

    public function __construct(bookInterface $bookInterface , )
    {

        $this->bookInterface = $bookInterface;

    }

    public function index(Request $request)
    {
        $query = $request->input('query');
        $books = collect();
        $users = collect();
    
        if ($query) {
            $results = $this->bookInterface->search($query);
            $books = $results['books'] ?? collect();
            $users = $results['users'] ?? collect();
        }
    
        return view('search', compact('books', 'users'));
    }
    
}
