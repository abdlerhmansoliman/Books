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
        Log::info('Decrypted cookie value from request: ' . ($locale ?? 'null'));

        $availableLocales = Config::get('app.available_locales', ['ar', 'en']);
        
        if ($locale && in_array($locale, $availableLocales)) {
            
            App::setLocale($locale);
            \Log::info('Language set to: ' . $locale . ' from cookie');
        } else {
            // Use default locale if cookie is not set or invalid
            $defaultLocale = Config::get('app.locale');
            App::setLocale($defaultLocale);
            Log::info('Using default language: ' . $defaultLocale . '. Cookie value: ' . ($locale ?? 'null'));
        }

        return $next($request);
    }
}
