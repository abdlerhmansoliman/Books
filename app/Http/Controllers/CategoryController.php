<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatRequest;
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
    public function add(){
        return view('admin.addcat');
      }
      public function store (CatRequest $request){
        $this->categoryRepository->store($request);
        return redirect()->route('cat.add')->with('success', 'Category added');
    }
      public function edit (Category $cat){
        return view ('admin.catedit',compact('cat'));
      }
      public function update(CatRequest $request , Category $cat){
        $this->categoryRepository->update($request,$cat);
        return redirect()->route('cat.add')->with('success', 'Category edited ');
      }
      public function destroy(Category $cat){
        $this->categoryRepository->delete($cat);
        return redirect()->back();
      }
      
}
