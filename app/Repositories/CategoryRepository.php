<?php

namespace App\Repositories;

use App\Http\Requests\CatRequest;
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
    
    public function store(CatRequest $request){
        return Category::create($request->validated());
    }
    public function update(CatRequest $request, Category $category)
    {
        return $category->update($request->validated());
    }
    public function delete(Category $category)
    {
        return $category->delete();
    }

    }

