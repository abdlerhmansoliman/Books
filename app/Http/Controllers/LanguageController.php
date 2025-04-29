<?php

namespace App\Http\Controllers;

use App\Interfaces\LanguageInterface;
use App\Repositories\LanguageRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    protected $languageRepo;

    public function __construct(LanguageInterface $languageRepo)
    {
        $this->languageRepo = $languageRepo;
    }

    public function switch(Request $request , $locale )
    {
        $succes=$this->languageRepo->setLocale($locale);
        if(!$succes){
            return redirect()->back()->withErrors(['message' => 'اللغة غير مدعومة']);
        }
        App::setLocale($locale);
        
        return redirect()->route('home');
    }
}
