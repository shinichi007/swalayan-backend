<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Member;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $pendings = Member::where('status','pending')->get();
        return view('customers/customers',[
            'title' => 'Customer',
            'regulars' => Member::where('status','regular')->get(),
            'customers' => Member::get(),
            'members' => Member::where('status','member')->get(),
            'pendings' => $pendings,
            'countPending' => count($pendings)
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
