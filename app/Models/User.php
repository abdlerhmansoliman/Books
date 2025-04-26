<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'author_desc',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function uploads()
    {
        return $this->morphMany(Upload::class, 'uploadable');
    }
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rateable');
    }
    public function books()
    {
        return $this->hasMany(Book::class);
    }
    public function bookmarks(){
        return $this->hasMany(BookMArk::class);
    }
    public function bookmarkedBooks()
    {
        return $this->belongsToMany(Book::class, 'book_user_bookmarks')->withTimestamps();
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function profile_image()
    {
        return $this->morphOne(Upload::class, 'uploadable')->where('type', 'profile_image');
    }
    
    public function getProfileImageAttribute()
    {
        $profileImage = $this->profile_image()->first(); 
    
        if ($profileImage) {
            return asset('storage/' . $profileImage->path);
        }
    
        // استخدام Gravatar كصورة افتراضية
        $email = strtolower(trim($this->email)); 
        $hashedEmail = md5($email); 
        $size = 200; 
        return "https://www.gravatar.com/avatar/{$hashedEmail}?s={$size}&d=mp";
    }
    public function getAverageRatingAttribute()
{
    return \App\Models\Rating::where('rateable_type', self::class)
                ->where('rateable_id', $this->id)
                ->avg('rating');
}
public function getReviewsCountAttribute()
{
    return $this->reviews()->count();
}
public function downloads(){
    return $this->hasMany(Download::class);
}
}
