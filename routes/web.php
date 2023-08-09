<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\StudentsController;

use App\Http\Middleware\ActorType;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[SetupController::class,'index'])->name('setup.index');
Route::get('/config/{type}',[SetupController::class,'config'])->name('setup.config');
Route::get('/login',[LoginController::class,'showlogin'])->name('showlogin');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::middleware([ActorType::class])->group(function () {

Route::get('/books',[BookController::class,'books'])->name('books');
Route::get('/addbook',[BookController::class,'addbook'])->name('addbook');
Route::get('/updatebook',[BookController::class,'updatebook'])->name('updatebook');
Route::get('/deletebook/{id}',[BookController::class,'deletebook'])->name('deletebook');
Route::get('/singlebook/{id}',[BookController::class,'singlebook'])->name('singlebook');
Route::get('/customers',[CustomerController::class,'customers'])->name('customers');
Route::get('/addcustomer',[CustomerController::class,'addcustomer'])->name('addcustomer');
Route::get('/updatecustomer',[CustomerController::class,'updatecustomer'])->name('updatecustomer');
Route::get('/deletecustomer/{id}',[CustomerController::class,'deletecustomer'])->name('deletecustomer');
Route::get('/singlecustomer/{id}',[CustomerController::class,'singlecustomer'])->name('singlecustomer');
Route::get('/borrows',[BorrowController::class,'Borrows'])->name('borrows');
Route::get('/addBorrow',[BorrowController::class,'addBorrow'])->name('addBorrow');
Route::get('/updateBorrow',[BorrowController::class,'updateBorrow'])->name('updateBorrow');
Route::get('/deleteBorrow/{id}',[BorrowController::class,'deleteBorrow'])->name('deleteBorrow');
Route::get('/singleBorrow/{id}',[BorrowController::class,'singleBorrow'])->name('singleBorrow');
Route::get('/students',[StudentsController::class,'Students'])->name('students');
Route::get('/addstudent',[StudentsController::class,'addStudent'])->name('addstudent');
Route::get('/updatestudent',[StudentsController::class,'updateStudent'])->name('updatstudent');
Route::get('/deletestudent/{id}',[StudentsController::class,'deleteStudent'])->name('deletestudent');
Route::get('/singlestudent/{id}',[StudentsController::class,'singlesStudent'])->name('singlestudent');
});

