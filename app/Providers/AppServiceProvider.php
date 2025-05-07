<?php

namespace App\Providers;
use App\Interfaces\RatingInterface;
use App\Repositories\RatingRepository;
use App\interfaces\bookInterface;
use App\Interfaces\BookMarkInterface;
use App\Interfaces\CategoryInterface;
use App\Interfaces\DashboardInterface;
use App\Interfaces\LanguageInterface;
use App\Interfaces\ReviewInterface;
use App\Interfaces\UserInterface;
use App\Repositories\BookmarkRepository;
use App\Repositories\bookRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\DashboardRepository;
use App\Repositories\LanguageRepository;
use App\Repositories\ReviewRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(bookInterface::class, bookRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(DashboardInterface::class,DashboardRepository::class);
        $this->app->bind(BookmarkInterface::class, BookmarkRepository::class);
        $this->app->bind(RatingInterface::class, RatingRepository::class);
        $this->app->bind(ReviewInterface::class, ReviewRepository::class);
        $this->app->bind(RatingInterface::class, RatingRepository::class);
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(LanguageInterface::class,LanguageRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot( ): void
    {
        $locale = Cookie::get('locale');
        $availableLocales = Config::get('app.available_locales', ['ar', 'en']);
        
        if ($locale && in_array($locale, $availableLocales)) {
            App::setLocale($locale);
        }
     }
}
