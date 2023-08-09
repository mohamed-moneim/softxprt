<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\StudentRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    private $StudentRepository;

    public function __construct(StudentRepositoryInterface $cRepository)
    {
        $this->StudentRepository = $cRepository;
    }
    public function Students(){
        $st =  $this->StudentRepository->allStudents();

        return view("courses/students")->with("st",$st);

    }
    public function addStudent(Request $request ){
        $rules = array('name' => "required|min:3","grade"=>"required","birthdate"=>"required");
 
        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()){
            $this->StudentRepository->storeStudent($request);
            return redirect()->to("students");      
        }
    }
        public function updateStudent(Request $request ){
            $rules = array('name' => "required|min:3","phone"=>"required|min:3","birthdate"=>"required");

            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()){
                $this->StudentRepository->updateStudent($request, $request->old);

                return redirect()->to("Students");
            
            }
        }
            public function deleteStudent($id){
                    $book =   $this->StudentRepository->destroyStudent($id);
                    return redirect()->to("Students");
        }
        public function singleStudent($id){
            $book =   $this->StudentRepository->findStudent($id);
            return view("bookstore/student")->with("book",$book);
    
        }
    }
