<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\BorrowRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class BorrowController extends Controller
{
    private $BorrowRepository;

    public function __construct(BorrowRepositoryInterface $bRepository)
    {
        $this->BorrowRepository = $bRepository;
    }
    public function Borrows(){
        $borrow =  $this->BorrowRepository->allBorrows();

        return view("bookstore/borrows")->with("borrow",$borrow);

    }
    public function addBorrow(Request $request ){
        $rules = array('startDate' => "required","endDate"=>"required");
 
        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()){
            $this->BorrowRepository->storeBorrow($request);
            return redirect()->to("borrows");      
        }
    }
        public function updateBorrow(Request $request ){
            $rules = array('startDate' => "required","endDate"=>"required");

            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()){
                $this->BorrowRepository->updateBorrow($request, $request->old);

                return redirect()->to("borrows");      
            
            }
        }
            public function deleteBorrow($id){
                    $book =   $this->BorrowRepository->destroyBorrow($id);
                    return redirect()->to("borrows");      
                }
        public function singleBorrow($id){
            $book =   $this->BorrowRepository->findBorrow($id);
            return view("bookstore/borrow")->with("b",$book);
    
        }
    }
