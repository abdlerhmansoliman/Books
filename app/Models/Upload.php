<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'path','size',];

    public function uploadable()
    {
        return $this->morphTo();
    }

}
