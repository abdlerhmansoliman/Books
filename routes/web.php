<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/book/{id}',[BookController::class, 'show'])->name('books.show');

Route::get('/add',[BookController::class, 'create'])->name('addbook');
Route::post('/add',[BookController::class, 'store'])->name('storebook');
Route::post('bookmark/{book}',[BookmarkController::class, 'add'])->name('bookmark.add');
Route::get('books/{id}/download', [BookController::class, 'download'])->name('books.download');
Route::get('books/{id}/read', [BookController::class, 'read'])->name('books.read');
Route::post('books/{book}/rate', [BookController::class, 'rate'])->name('books.rate');
Route::post('reviews/{reviewId}/rate', [ReviewController::class, 'rateReview'])->name('review.rate');
Route::get('top-rated-books', [BookController::class, 'getTopRatedBooks'])->name('books.top-rated');
Route::get('/authors', [UserController::class, 'index'])->name('books.authors');
Route::get('/authors/{id}', [UserController::class, 'show'])->name('books.author');
Route::post('/authors/{id}/rating', [UserController::class, 'rateAuthor'])->name('authors.rating.store');
Route::get('/categories',[CategoryController::class,'index'])->name('category.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
Route::get('/profile/', [ProfileController::class, 'show'])->name('profile');

Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::middleware('auth')->group(function () {

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
