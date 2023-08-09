<?php

namespace App\Repository;

interface BorrowRepositoryInterface 
{
    public function  allBorrows();
    public function  storeBorrow($data);
    public function  findBorrow($id);
    public function updateBorrow($data,$id);
    public function destroyBorrow($id);
}