<?php

namespace App\Repository;

use App\Repository\BorrowRepositoryInterface;
use App\Models\Borrow;
use App\Models\Customer;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BorrowRepository implements BorrowRepositoryInterface
{

    public function allBorrows()
    {
        $borrows =  Borrow::latest()->paginate(10);
        $customers =  Customer::all();
        $books =  Book::all();
        return [$borrows,$customers,$books];
    }

    public function storeBorrow($data)
    {
        $c = new  Borrow();
        $c->customerid = $data->customerid;
        $c->bookid = $data->bookid;
        $c->startDate = $data->startDate;
        $c->endDate = $data->endDate;
        return $c->save();
    
    }

    public function findBorrow($id)
    {
        return Borrow::find($id);
    }

    public function updateBorrow($data, $id)
    {
        if (Auth::user()->can('admin')){
        $c = Borrow::where('id', $id)->first();
        $c->startDate = $data->startDate;
        $c->endDate = $data->endDate;
        return $c->save();

        }
    }

    public function destroyBorrow($id)
    {
        if (Auth::user()->can('admin')){
        $c = Borrow::find($id);
        $c->delete();
    }
    }
}
