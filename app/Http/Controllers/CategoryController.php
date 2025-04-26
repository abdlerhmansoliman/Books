<?php

namespace App\Http\Controllers;

use App\Interfaces\CategoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryInterface $categoryRepository )
    {
        $this->categoryRepository=$categoryRepository;
    }
    
    public function index(){
        $categories = $this->categoryRepository->index();
        return view('categories',compact('categories'));
    }
    public function show($id){
        $category=$this->categoryRepository->getCategoiesBooks($id);
        return view('category',compact('category'));
    }
}
