<?php

namespace App\Http\Controllers;

use App\Http\Requests\RateRequest;
use App\Http\Requests\StoreRequest;
use App\interfaces\bookInterface;
use App\Interfaces\RatingInterface;
use App\Interfaces\ReviewInterface;
use App\Interfaces\UserInterface;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    protected $bookInterface;
    protected $reviewInterface;
    protected $ratingInterface;
    protected $userInterface;
    public function __construct(bookInterface $bookInterface , ReviewInterface $reviewInterface , RatingInterface $ratingInterface , UserInterface $userInterface)
    {

        $this->bookInterface = $bookInterface;
        $this->reviewInterface = $reviewInterface;
        $this->ratingInterface = $ratingInterface;
        $this->userInterface=$userInterface;
    }
    public function index()
    {
        $books = $this->bookInterface->index();
        return view('index', compact('books'));
    }
    public function show($id){
        $user=Auth::user();
        $data=$this->bookInterface->show($id);
        $book = $data['book'];
        
        $relatedBooks=$this->bookInterface->getBookByCategory($book->category_id, $book->id,5);
        $data['relatedBooks'] = $relatedBooks;
        $data['user'] = $user;
        return view('book', $data);
        
    }
    public function create()
    {
        $categories = $this->bookInterface->create();
        return view('addbook', compact('categories'));  
    }
    public function store(StoreRequest $request)
    {
        $book=$this->bookInterface->store($request->validated());
        
        return redirect()->back();
    }  
    public function download($id)
        {
            return $this->bookInterface->download($id);
        }
    public function read($id)
        {
            $result=$this->bookInterface->read($id);
            if (!$result) {
                abort(404, 'PDF not found.');
            }
            $pdfUrl=asset('storage/' . $result['pdf_path']);
            return view('read', compact('pdfUrl'));
        }

    public function rate(RateRequest $request , Book $book){
            $userId=Auth::id();
            $date=$request->validated();
            if(!empty($date['review'])){
                $this->reviewInterface->createReview($book, $date, $userId);
            }   
            
            $this->ratingInterface->rateBook($book, $date, $userId);
            return redirect()->back();
        }
    public function getTopRatedBooks()
        {
            $topRatedBooks = $this->bookInterface->getTopRated();
            return view('bestbooks', compact('topRatedBooks'));
        }
        public function getUserRating($authorId){
          $authorRating= $this->userInterface->getAuthorRatingCount($authorId);
          return view ('book', compact ('authorRating'));

        }
        public function policy(){
            return view('Policies');
        }

    }
