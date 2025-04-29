<?php

namespace App\Repositories;

use App\Interfaces\LanguageInterface;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class LanguageRepository implements LanguageInterface
{
    protected string $cookieName='locale';
    protected int $cookieExp=43200;

    public function getAvailableLanguages()
    {
        return Config::get("app.available_locales",['ar']);
    }
    public function setLocale($locale)
    {
        if(in_array($locale,$this->getAvailableLanguages())){
            App::setLocale($locale);
            $this->saveLocaleToCookie($locale);
            return true;
        }
        return false;
    }
    public function getCurrentLocale()
    {
        return App::getLocale();
    }
    public function saveLocaleToCookie($locale)
    {
     Cookie::queue(
        Cookie::make($this->cookieName, $locale, $this->cookieExp, null, null, false, false)
    );
    }
    public function getLocaleFormCookie()
    {
        return Cookie::get($this->cookieName);
    }
}

