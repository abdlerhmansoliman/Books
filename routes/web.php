<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/book/{id}',[BookController::class, 'show'])->name('books.show');
Route::get('/Policies',[BookController::class,'policy'])->name('book.policy');

Route::post('bookmark/{book}',[BookmarkController::class, 'add'])->name('bookmark.add');

Route::post('books/{book}/rate', [BookController::class, 'rate'])->name('books.rate');
Route::post('reviews/{reviewId}/rate', [ReviewController::class, 'rateReview'])->name('review.rate');
Route::get('top-rated-books', [BookController::class, 'getTopRatedBooks'])->name('books.top-rated');
Route::get('/authors', [UserController::class, 'index'])->name('books.authors');
Route::get('/authors/{id}', [UserController::class, 'show'])->name('books.author');
Route::post('/authors/{id}/rating', [UserController::class, 'rateAuthor'])->name('authors.rating.store');
Route::get('/categories',[CategoryController::class,'index'])->name('category.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/search',[SearchController::class,'index'])->name('search');
Route::get('language/{locale}', [LanguageController::class, 'switch'])->name('language.switch');

Route::middleware([ 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/dashboard/users', [DashboardController::class,'getUsers'])->name('dashboard.users');
    Route::get('/dashboard/books',[DashboardController::class,'getBooks'])->name('dashboard.books');
    Route::get('dashboard/category',[DashboardController::class,'getCat'])->name('dashboard.cat');
    Route::get('dashboard/request',[DashboardController::class,'getRequest'])->name('dashboard.request');
    Route::get('dashboard/category/add',[CategoryController::class,'add'])->name('cat.add');
    Route::get('dashboard/reviews',[ReviewController::class,'index'])->name('dashboard.reviews');


    Route::delete('dashboard/review/{review}',[ReviewController::class,'destroy'])->name('review.destroy');
    Route::delete('dashboard/cat/{cat}',[CategoryController::class,'destroy'])->name('cat.destroy');
    Route::post('dashboard/category/store',[CategoryController::class,'store'])->name('cat.store');
    Route::get('dashboard/cat/{cat}/edit',[CategoryController::class,'edit'])->name('cat.edit');
    Route::patch('dashboard/cat/{cat}',[CategoryController::class,'update'])->name('cat.update');
    
    Route::patch('/dashboard/{user}', [DashboardController::class, 'update'])->name('dashboard.user.update');

    Route::get('/dashboard/{type}/{id}',[DashboardController::class,'edit'])->name('dashboard.edit');
    Route::patch('/edit/{book}',[DashboardController::class,'updateBook'])->name('book.update');
    Route::delete('/dashboard/{type}/{id}', [DashboardController::class, 'destroy'])->name('dashboard.delete');
    Route::put('dashboard/{id}/request',[DashboardController::class,'updateStatus'])->name('request.update');

});

Route::middleware('auth')->group(function () {

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::get('/edit',[ProfileController::class,'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

});
Route::middleware(['auth', 'ensureUser'])->group(function () {
    Route::get('/add',[BookController::class, 'create'])->name('addbook');
    Route::post('/add',[BookController::class, 'store'])->name('storebook'); 
    Route::get('books/{id}/download', [BookController::class, 'download'])->name('books.download');
    Route::get('books/{id}/read', [BookController::class, 'read'])->name('books.read');
});

require __DIR__.'/auth.php';
