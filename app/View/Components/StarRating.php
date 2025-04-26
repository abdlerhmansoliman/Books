<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StarRating extends Component
{
    public float $rating;

    public function __construct(float $rating=0)
    {
        $this->rating = $rating;
    }

    public function render()
    {
        return view('components.star-rating');
    }
}