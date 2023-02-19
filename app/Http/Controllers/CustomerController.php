<?php

namespace App\Http\Controllers;
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
            'countPending' => $pendings->count()
        ]);
    }

    public function detail_customer($customer_id) {
        return view('customers/detail-customer',[
            'title' => 'Detail Customer',
            'customer' => Member::find($customer_id),
            'countPending' => Member::where('status','pending')->get()->count(),
        ]);
    }

    public function edit_customer($customer_id) {
        return view('customers/edit-customer',[
            'title' => 'Edit Customer',
            'customer' => Member::find($customer_id),
            'countPending' => Member::where('status','pending')->get()->count(),
        ]);
    }
}
