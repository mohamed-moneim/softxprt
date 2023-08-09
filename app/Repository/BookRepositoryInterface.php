<?php

namespace App\Repository;

interface BookRepositoryInterface 
{
    public function  allBooks();
    public function  storeBook($data);
    public function  findBook($id);
    public function updateBook($data,$id);
    public function destroyBook($id);
}