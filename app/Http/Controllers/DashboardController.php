<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index(){
        if(Schema::hasTable('courses')){
            return view("courses/dashboard");

        }
        elseif(Schema::hasTable('customers')){
        }
        return view("bookstore/dashboard");

    }
   
    }

