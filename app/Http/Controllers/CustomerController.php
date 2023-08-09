<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CustomerRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    private $CustomerRepository;

    public function __construct(CustomerRepositoryInterface $cRepository)
    {
        $this->CustomerRepository = $cRepository;
    }
    public function customers(){
        $cust =  $this->CustomerRepository->allCustomers();

        return view("bookstore/customers")->with("cust",$cust);

    }
    public function addcustomer(Request $request ){
        $rules = array('name' => "required|min:3","phone"=>"required|min:3","birthdate"=>"required");
 
        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()){
            $this->CustomerRepository->storeCustomer($request);
            return redirect()->to("customers");      
        }
    }
        public function updatecustomer(Request $request ){
            $rules = array('name' => "required|min:3","phone"=>"required|min:3","birthdate"=>"required");

            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()){
                $this->CustomerRepository->updateCustomer($request, $request->old);

                return redirect()->to("customers");
            
            }
        }
            public function deletecustomer($id){
                    $book =   $this->CustomerRepository->destroyCustomer($id);
                    return redirect()->to("customers");
        }
        public function singlecustomer($id){
            $c =   $this->CustomerRepository->findCustomer($id);
            return view("bookstore/customer")->with("c",$c);
    
        }
    }
