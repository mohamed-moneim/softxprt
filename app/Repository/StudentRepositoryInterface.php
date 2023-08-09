<?php

namespace App\Repository;

interface StudentRepositoryInterface 
{
    public function  allStudents();
    public function  storeStudent($data);
    public function  findStudent($id);
    public function updateStudent($data,$id);
    public function destroyStudent($id);
}