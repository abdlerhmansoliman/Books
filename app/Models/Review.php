<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id', 'book_id', 'review'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ratings(){
        return $this->morphMany(Rating::class, 'rateable');
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function getRatingCountAttribute(){
        return $this->ratings()->count();
    }
    public function getRatingAvgAttribute(){
        return $this->ratings()->avg('rating');
    }

}
