<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name_en','name_ar'];
    protected $table = 'categories';


    public function books()
    {
        return $this->hasMany(Book::class);
    }  
    public function getNameAttribute()
    {
        $locale = app()->getLocale(); 
        return $this->{'name_' . $locale};
    }
}
