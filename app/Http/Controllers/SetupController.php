<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminOperator;
use Illuminate\Support\Facades\Schema;
class SetupController extends Controller
{

    public function index(){
        if(!Schema::hasTable('adminoperators')){
            \Artisan::call('migrate', array('--path' => 'database/migrations/adminoperator'));
            \Artisan::call('db:seed');
        }
        if(!Schema::hasTable('courses')&& !Schema::hasTable('customers')){
            return view('welcome');
        }else{
         return redirect('login');
         
            }
    }
    public function config($type){
        if($type=="bookstore"){
            \Artisan::call('migrate', array('--path' => 'database/migrations/bookstore'));
            return redirect('login');


        }elseif($type=="course"){
            \Artisan::call('migrate', array('--path' => 'database/migrations/course'));
            \Artisan::call('migrate', array('--path' => 'database/migrations/course/courses'));
            return redirect('login');


        }

    }

}
