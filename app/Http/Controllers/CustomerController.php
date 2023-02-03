<?php

namespace App\Http\Controllers;
use App\Models\Customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        return view('customers/customers',[
            'title' => 'Customer',
            'regular' => Customer::regular(),
            'member' => Customer::member(),
            'pending' => Customer::pending(),
            'customers' => Customer::all(),
            'countPending' => Customer::countPending()
        ]);
    }

    public function detailCustomer($id) {
        return view('customers/detail-customer',[
            'title' => 'Detail Customer',
            'customer' => Customer::detailCustomer($id),
            'countPending' => Customer::countPending()
        ]);
    }
    
    public function editCustomer($id) {
        return view('customers/edit-customer',[
            'title' => 'Edit Customer',
            'customer' => Customer::detailCustomer($id),
            'countPending' => Customer::countPending()
        ]);
    }
}
