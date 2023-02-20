<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use OwenIt\Auditing\Models\Audit;

class CustomerController extends Controller
{
    public function index(){

        if(!Cache::has(Member::CACHE_KEY)){
            Member::cache_warming();
        }

        return view('customers/customers',[
            'title'         => 'Customer',
            'regulars'      => Member::where('status','regular')->get(),
            'customers'     => Member::get(),
            'members'       => Member::where('status','member')->get(),
            'pendings'      => Member::where('status','pending')->get(),
            'countPending'  => Cache::get(Member::CACHE_KEY.'_count')
        ]);
    }

    public function detail_customer($customer_id) {
        if(!Cache::has(Member::CACHE_KEY)){
            Member::cache_warming();
        }

        $audits = Audit::with('user')
            ->where('auditable_id',$customer_id)
            ->where('user_id','>',0)
            ->where('old_values','LIKE', '%point%')
            ->where('auditable_type','App\Models\Member')
            ->orderBy('created_at', 'desc')->get();

        return view('customers/detail-customer',[
            'title' => 'Detail Customer',
            'audits' => $audits,
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
            $member->status = $request->status;
            if($request->status == 'reject'){
                $member->nik = 'NIK-'.$customer_id;
                $member->reason = $request->reason;
            }
            $member->save();

            return redirect()->intended('customers')
                                ->withSuccess('verifikasi berhasil');
        }
        catch(\Exception $e){
            return redirect()->intended('customer/'.$customer_id)
                                ->with('error','verifikasi gagal');
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

    public function do_update_customer(Request $request, $customer_id) {
        try{
            request()->validate([
                'name' => 'required|string',
                'point'  => 'required|integer'
            ]);

            $member = Member::find($customer_id);
            $user = $member->user;
            $user->name = $request->name;
            $user->save();

            $member->point = $request->point;
            $member->save();

            return redirect()->intended('customer/edit/'.$customer_id)
                                ->withSuccess('update data berhasil');
        }
        catch(\Exception $e){
            return redirect()->intended('customer/edit/'.$customer_id)
                                ->with('error','update data gagal');
        }
    }


    public function delete_customer($customer_id){
        try{
            $user = Auth::user();
            $member = Member::where('id',$customer_id)->first();
            if(in_array($user->role,['admin','operator'])){
                $c_user = $member->user;

                foreach($c_user->addresses as $address){
                    $address->delete();
                }

                $member->delete();
                $c_user->delete();
            }
            return redirect()->intended('/customers');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }
    }
}
