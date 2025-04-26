<?php

namespace App\Providers;
use App\Interfaces\RatingInterface;
use App\Repositories\RatingRepository;
use App\interfaces\bookInterface;
use App\Interfaces\BookMarkInterface;
use App\Interfaces\CategoryInterface;
use App\Interfaces\ReviewInterface;
use App\Interfaces\UserInterface;
use App\Repositories\BookmarkRepository;
use App\Repositories\bookRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ReviewRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(bookInterface::class,bookRepository::class);
        $this->app->bind(BookmarkInterface::class, BookmarkRepository::class);
        $this->app->bind(RatingInterface::class, RatingRepository::class);
        $this->app->bind(ReviewInterface::class, ReviewRepository::class);
        $this->app->bind(RatingInterface::class, RatingRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
