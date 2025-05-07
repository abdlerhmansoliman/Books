<?php

namespace App\Repositories;

use App\Interfaces\ReadInterface;
use App\Models\Read;

class ReadRepository implements ReadInterface
{
//    public function recordRead(){
//     return Read::create([
//         'user_id'
//     ]);
//    }
      public function getBookRead($bookId){
        return Read::where('book_id', $bookId)->count();
      }
    public function getTotleReads(){
        return Read::count();
    }


}

