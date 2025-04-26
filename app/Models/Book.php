<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'auth_name',
        'user_id',
        'description',
        'category_id',
        'publication_year',
        'pages',
    ];
    public function uploads()
    {
        return $this->morphMany(Upload::class, 'uploadable');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function coverImage(){
        return $this->uploads()->where('type','image_cover')->first();
    }
    public function getPdfSizeAttribute(){
        $pdf= $this->uploads()->where('type','pdf')->first();
        return $pdf ? number_format($pdf->size / 1024, 2) . ' KB' : null;

    }
    public function bookmarks(){
        return $this->hasMany(Bookmark::class);
    }
    public function bookmarkedBy($userId)
    {
        return $this->bookmarks()->where('user_id',$userId)->exists();
    }
    public function ratings(){
        return $this->morphMany(Rating::class, 'rateable');
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function getPdf(){
        return $this->uploads()->where('type','pdf')->first();
    }
    public function getRatingsAvgRatingAttribute()
    {
        return $this->ratings()->avg('rating'); 
    }   
    public function downloads(){
        return $this->hasMany(Download::class);
    } 
}
