<?php

namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface
{
    public function index()
    {
        return Category::withCount('books')->get();

    }
    public function getCategoiesBooks($categoryId){

        return Category::with('books')->findOrFail($categoryId);
    }



    }

