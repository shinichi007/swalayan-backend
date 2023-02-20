<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CustomerController extends Controller
{
    public function index(){

        if(!Cache::has(Member::CACHE_KEY)){
            Member::cache_warming();
        }

        return view('customers/customers',[
            'title' => 'Customer',
            'regulars' => Member::where('status','regular')->get(),
            'customers' => Cache::get(Member::CACHE_KEY),
            'members' => Member::where('status','member')->get(),
            'pendings' => Member::where('status','pending')->get(),
            'countPending' => Cache::get(Member::CACHE_KEY.'_count')
        ]);
    }

    public function detail_customer($customer_id) {
        if(!Cache::has(Member::CACHE_KEY)){
            Member::cache_warming();
        }

        return view('customers/detail-customer',[
            'title' => 'Detail Customer',
            'customer' => Member::find($customer_id),
            'countPending' => Cache::get(Member::CACHE_KEY.'_count')
        ]);
    }

    public function verify_customer($customer_id) {
        if(!Cache::has(Member::CACHE_KEY)){
            Member::cache_warming();
        }

        return view('customers/verify-customer',[
            'title' => 'Verify Customer',
            'customer' => Member::find($customer_id),
            'countPending' => Cache::get(Member::CACHE_KEY.'_count')
        ]);
    }

    public function do_verify_customer(Request $request, $customer_id) {
        try{
            request()->validate([
                'status'         => 'required|string',
            ]);

            $member = Member::find($customer_id);
            $member->nik = '';
            $member->status = $request->status;
            if($request->reason)
                $member->reason = $request->reason;
            $member->save();

            return redirect()->intended('customer')
                                ->withSuccess('login berhasil');
        }
        catch(\Exception $e){
            return redirect()->intended('customer')
                                ->withSuccess('login berhasil');
        }
    }

    public function edit_customer($customer_id) {
        if(!Cache::has(Member::CACHE_KEY)){
            Member::cache_warming();
        }

        return view('customers/edit-customer',[
            'title' => 'Edit Customer',
            'customer' => Member::find($customer_id),
            'countPending' => Cache::get(Member::CACHE_KEY.'_count')
        ]);
    }
}
