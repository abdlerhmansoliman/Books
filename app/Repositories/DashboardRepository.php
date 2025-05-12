<?php

namespace App\Repositories;

use App\Interfaces\DashboardInterface;
use App\Models\Book;
use App\Models\Category;
use App\Models\Download;
use App\Models\Read;
use App\Models\Review;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardRepository implements DashboardInterface
{

        public function reviewsCount(){
            return Review::count();
        }
        public function readCount(){
            return Read::count();
        }
        public function getRoles(){
            return Role::all();
        } 
        public function getStatues(){
            return Status::all();
        }

        public function countPendingRequests(): int
        {
            return Book::where('status', 'pending')->count();
        }
        public function update(User $user , array $data){
        
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'bio' => $data['bio'],
        ]);
        $user->roles()->sync($data['roles']);
        $user->statuse()->sync($data['statuses']);
        if (isset($data['image'])) {

            $path = $data['image']->store('profile_images', 'public');   
            $uploadData = [
                'type' => 'profile_image',
                'path' => $path,           
                'size' => $data['image']->getSize(), 
                'uploadable_id' => $user->id, 
                'uploadable_type' => get_class($user), 
            ];
        
            if ($user->uploads()->exists()) {
                $user->uploads()->update($uploadData);
            } else {
                $user->uploads()->create($uploadData);
            }
        }
        
        return $user;
    }

    public function updateBook(Book $book ,array $data){
        $book->update([
            'title' => $data['title'],
            'auth_name' => $data['auth_name'],
            'user_id' => Auth::id(),
            'category_id' => $data['category_id'],
            'description' => $data['description'],
            'pages' => $data['pages'],
            'publication_year' => $data['publication_year'],
            'language' => $data['language'],
        ]);
        if(isset($data['image_cover'])){
            $path=$data['image_cover']->store('books/image_cover','public');
            $uploadData = [
                'type' => 'image_cover',
                'path' => $path,           
                'size' => $data['image_cover']->getSize(), 
                'uploadable_id' => $book->id, 
                'uploadable_type' => get_class($book), 
            ];
            if($book->uploads()->exists()){
                $book->uploads()->update($uploadData);
            }
            else{
                $book->uploads()->create($uploadData);
            }
        }

        
            if(isset($data['pdf'])){
                $path=$data['pdf']->store('books/pdf','public');
                $uploadData = [
                    'type' => 'pdf',
                    'path' => $path,           
                    'size' => $data['pdf']->getSize(), 
                    'uploadable_id' => $book->id, 
                    'uploadable_type' => get_class($book), 
                ];
                if($book->uploads()->exists()){
                    $book->uploads()->update($uploadData);
                }
                else{
                    $book->uploads()->create($uploadData);
                }
        }
        return $book;
    }
    public function getRequest(){
      return Book::where('status','pending')->get();
    }
    public function updatStatus($bookId ,$status){
        $book=Book::findOrFail($bookId);
        $book->status=$status;
        $book->save();
        return $book;
    }


}

