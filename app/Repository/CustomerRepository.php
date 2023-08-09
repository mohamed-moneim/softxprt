<?php

namespace App\Repository;

use App\Repository\CustomerRepositoryInterface;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class CustomerRepository implements CustomerRepositoryInterface
{

    public function allCustomers()
    {
        return Customer::latest()->paginate(10);
    }

    public function storeCustomer($data)
    {
        $c = new  Customer();
        $c->name = $data->name;
        $c->birthdate = $data->birthdate;
        $c->phone = $data->phone;
        return $c->save();
    
    }

    public function findCustomer($id)
    {
        return Customer::find($id);
    }

    public function updateCustomer($data, $id)
    {
        if (Auth::user()->can('admin')){
        $c = Customer::where('id', $id)->first();
        $c->name = $data->name;
        $c->birthdate = $data->birthdate;
        $c->phone = $data->phone;
        $c->save();

        }
    }

    public function destroyCustomer($id)
    {
        if (Auth::user()->can('admin')){
        $c = Customer::find($id);
        $c->delete();
    }
    }
}
