<?php

namespace App\Interfaces;

use App\Models\Book;
use App\Models\User;

interface bookInterface
{
    public function index();
    public function create();
    public function show($id);
    public function store(array $data): Book;
    public function download( $id);
    public function read( $id);
    public function getBookByCategory(int $categoryId, int $excludeBookId, int $limit );
    public function getTopRated();
    public function search(string $query);


    
}
