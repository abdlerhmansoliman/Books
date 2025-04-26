<?php

namespace App\Repositories;

use App\interfaces\bookInterface;
use App\Models\Book;
use App\Models\Category;
use App\Models\Rating;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Download;

class bookRepository implements bookInterface
{
    /**
     * Create a new class instance.
     */

    public function __construct()
    {
        
    }
    public function index()
    {
        // index logic
        
        return Book::withCount(['ratings'])
        ->withAvg('ratings', 'rating') // نحسب متوسط التقييم
        ->get();
        
    }
    public function show($id)
    {
        // show logic
        try{
        $book= Book::with(['uploads', 'category','reviews.user.uploads',])
        ->withCount(['reviews', 'ratings']) // نحسب عدد التقييمات
        ->withAvg('ratings', 'rating')      // نحسب متوسط التقييم
        ->findOrFail($id); 
        }
        catch(ModelNotFoundException $e){
            Log::warning("Book not found:ID={$id}");
            abort(404, 'Book not found.');
        }
        $pdfUpload= $book->getPdf();
        $downloadCount = $book->downloads_count;
        $fileExtension = $pdfUpload ? pathinfo($pdfUpload->path, PATHINFO_EXTENSION) : null;
        
        $booksByAuthor = Book::where('auth_name', $book->auth_name)
        ->where('id', '!=', $book->id)
        ->take(5)
        ->withCount('ratings') 
        ->withAvg('ratings', 'rating')
        ->get();   

        return [
            'book' => $book,
            'fileExtension' => $fileExtension,
            'downloadCount' => $downloadCount,
            'booksByAuthor' => $booksByAuthor,
        ];     
    }
    public function create()
    {
        // create logic
        return Category::all();  
    }
    public function store( array $data): Book
    {
        // storelogic
        $book = Book::create([
            'title' => $data['title'],
            'auth_name' => $data['auth_name'],
            'user_id' => Auth::id(),
            'category_id' => $data['category_id'],
            'description' => $data['description'],
            'pages' => $data['pages'],
            'publication_year' => $data['publication_year'],
        ]);

        if(isset($data['pdf'])){
            $pdf = $data['pdf'];
            $pdfPath = $pdf->store('books/pdf', 'public');
            
            $book->uploads()->create([
                'type' => 'pdf',
                'path' => $pdfPath,
                'size' => $pdf->getSize(),  
            ]);
        }
        if(isset($data['image_cover'])){
            $cover = $data['image_cover'];

            $cover_path=$data['image_cover']->store('books/image_cover','public');
            $book->uploads()->create([
                'type'=>'image_cover',
                'path'=>$cover_path,
                'size' => $cover->getSize(),
            ]);
        }
        return $book;

        
    }

    
    public function download($id)
    {
        $book = Book::with('uploads')->findOrFail($id);
        $book->increment('downloads_count');
    
        $pdfUpload = $book->uploads()->where('type', 'pdf')->first();
        if (!$pdfUpload || !$pdfUpload->path) {
            abort(404, 'PDF not found for this book.');
        }
    
        if (!Storage::disk('public')->exists($pdfUpload->path)) {
            abort(404, 'File does not exist.');
        }
    
        if (Auth::check()) {
            Download::create([
                'user_id' => Auth::id(),
                'book_id' => $book->id,
                'download_at' => now(),
            ]);
        }
    
        return Storage::disk('public')->download($pdfUpload->path, $book->title . '.pdf');
    }
    
    public function read($id){
        $book=Book::with('uploads')->findOrFail($id);
        $pdf=$book->uploads()->where('type', 'pdf')->first();
        if(! $pdf || ! $pdf->path){
            abort(404, 'PDF not found for this book.');
        }
        return [
            'book'=>$book,
            'pdf_path'=>$pdf->path,
        ];
    }


    public function getBookByCategory(int $categoryId, int $excludeBookId, int $limit = 5){
        return Book::where('category_id',$categoryId)
        ->where('id','!=',$excludeBookId)
        ->withCount('ratings') 
        ->withAvg('ratings', 'rating')
        ->take($limit)
        ->get();    
    }


    public function createReview(Book $book, array $data, int $userId) {
        $review=Review::create([
            'book_id'=>$book->id,
            'user_id'=>$userId,
            'review'=>$data['review'],
        ]);
    }
    public function getTopRated()
    {

        return Book::with('ratings')
        ->withAvg('ratings', 'rating')
        ->orderByDesc('ratings_avg_rating')
        ->get();
    }




}

