<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UserEditRequest;
use App\interfaces\bookInterface;
use App\Interfaces\CategoryInterface;
use App\Interfaces\DashboardInterface;
use App\Interfaces\UserInterface;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    protected $dashrepo;
    protected $userRepo;
    protected $bookRepo;
    protected $catRepo;
    public function __construct(DashboardInterface $dashrepo , bookInterface $bookRepo, UserInterface $userRepo, CategoryInterface $catRepo){
        $this->dashrepo=$dashrepo;
        $this->userRepo=$userRepo;
        $this->bookRepo=$bookRepo;
        $this->catRepo=$catRepo;

    }
  public function index(){
   $userCount=$this->userRepo->count(); 
   $bookCount=$this->bookRepo->count();
   $reviewsCount=$this->dashrepo->reviewsCount();
   $readCount=$this->dashrepo->readCount();
   $pendingCount = $this->dashrepo->countPendingRequests();

    return view('admin.dashboard',compact('userCount','bookCount','reviewsCount','readCount','pendingCount'));
  }


  public function getUsers(){
    
    $users=$this->userRepo->getUserWithBookCount();
    
    return  view('admin.users', compact('users'));
  }
  public function edit( $type , $id ){
    if($type=='user'){
      $user = $this->userRepo->getUserBooksWithRating($id);
      $roles=$this->dashrepo->getRoles();
    $statueses=$this->dashrepo->getStatues();
      return view('admin.edit',compact('user','roles','statueses'));
    }
    elseif($type=='book'){
      $book = Book::findOrFail($id);
      $categories=$this->catRepo->index();
      return view ('admin.bookedit',compact('book','categories'));
    }
  }

  public function update(UserEditRequest $request, User $user)
  { 
    $this->dashrepo->update($user, $request->validated());

      return redirect()->back();
  }

  public function destroy ($type , $id){
    if($type=='user'){
      $user=User::findOrFail($id);
      $user->delete();
      return redirect()->back();
    }
    elseif($type=='book'){
      $book=Book::findOrFail($id);
      $book->delete();
      return redirect()->back();
    }    
    }
    public function getBooks(){
      $books=$this->bookRepo->index();
      return view('admin.books',compact('books') );
    }
    public function updateBook( StoreRequest $request ,Book $book){
      $this->dashrepo->updateBook($book, $request->validated());
      return redirect()->back();
    }
    public function getCat(){
      $categories=$this->catRepo->index();
      return view('admin.categories',compact('categories'));
    }
    public function getRequest(){
      $books=$this->dashrepo->getRequest();
      return view('admin.requests', compact('books'));
    }
    public function updateStatus(Request $request , $id){
      $status = $request->input('status');
      $book=$this->dashrepo->updatStatus($id, $status);
      return redirect()->back();

    }

}
