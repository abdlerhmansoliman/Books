<?php

namespace App\Http\Middleware;

use App\Repositories\LanguageRepository;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{

    protected $languageRepo;

    public function __construct(LanguageRepository $languageRepo)
    {
        $this->languageRepo = $languageRepo;
    }

    public function handle($request, Closure $next)
    {
        $locale = Cookie::get('locale');
        
        $availableLocales = Config::get('app.available_locales', ['ar', 'en']);
        
        if ($locale && in_array($locale, $availableLocales)) {
            // تعيين اللغة مباشرة
            App::setLocale($locale);
            \Log::info('Language set to: ' . $locale . ' from cookie');
        } else {
            \Log::info('Using default language: ' . Config::get('app.locale') . '. Cookie value: ' . ($locale ?? 'null'));
        }
        \Log::info('SetLocale middleware ran.');

        return $next($request);
    }
}
