<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\BookRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    private $BookRepository;

    public function __construct(BookRepositoryInterface $bRepository)
    {
        $this->BookRepository = $bRepository;
    }
    public function books(){
        $books =  $this->BookRepository->allBooks();

        return view("bookstore/books")->with("books",$books);

    }
    public function addbook(Request $request ){
        $rules = array('title' => "required|min:3","author"=>"required|min:3");
 
        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()){
            $this->BookRepository->storeBook($request);
            return redirect()->to("books");      
        }
    }
        public function updatebook(Request $request ){
            $rules = array('title' => "required|min:3","old"=>"required","author"=>"required|min:3");
     
            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()){
                $this->BookRepository->updateBook($request, $request->old);

                return redirect()->to("books");
            
            }
        }
            public function deletebook($id){
                    $book =   $this->BookRepository->destroyBook($id);
                    return redirect()->to("books");
        }
        public function singlebook($id){
            $book =   $this->BookRepository->findBook($id);
            return view("bookstore/book")->with("book",$book);
    
        }
    }
