<?php

namespace App\Repository;

use App\Repository\StudentRepositoryInterface;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class StudentRepository implements StudentRepositoryInterface
{

    public function allStudents()
    {
        return Student::latest()->paginate(10);
    }

    public function storeStudent($data)
    {
        $c = new  Student();
        $c->name = $data->name;
        $c->birthdate = $data->birthdate;
        $c->grade = $data->grade;
        return $c->save();
    
    }

    public function findStudent($id)
    {
        return Student::find($id);
    }

    public function updateStudent($data, $id)
    {
        if (Auth::user()->can('admin')){
        $c = Student::where('id', $id)->first();
        $c->name = $data->name;
        $c->birthdate = $data->birthdate;
        $c->grade = $data->grade;
        $c->save();

        }
    }

    public function destroyStudent($id)
    {
        if (Auth::user()->can('admin')){
        $c = Student::find($id);
        $c->delete();
    }
    }
}
