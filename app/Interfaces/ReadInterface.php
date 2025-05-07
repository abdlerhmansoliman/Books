<?php

namespace App\Interfaces;

interface ReadInterface
{
    // public function recordRead();
    public function getBookRead($bookId);
    public function getTotleReads();
}
