<?php

namespace App\Interfaces;

use App\Models\Category;

interface CategoryInterface
{
    public function index();
    public function getCategoiesBooks($categoryId);
}
