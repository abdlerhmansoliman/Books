<?php

namespace App\Interfaces;

use App\Http\Requests\CatRequest;
use App\Models\Category;

interface CategoryInterface
{
    public function index();
    public function getCategoiesBooks($categoryId);
    public function store(CatRequest $request);
    public function update(CatRequest $request, Category $category);
    public function delete(Category $category);}
