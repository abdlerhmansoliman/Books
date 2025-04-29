<?php

namespace App\Interfaces;

interface LanguageInterface
{
    public function getAvailableLanguages();
    public function setLocale($locale);
    public function getCurrentLocale();
    public function saveLocaleToCookie($locale);
    public function getLocaleFormCookie();
    
}
