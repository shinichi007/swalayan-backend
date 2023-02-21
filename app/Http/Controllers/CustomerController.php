<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use OwenIt\Auditing\Models\Audit;

class CustomerController extends Controller
{
    public function index(){

        if(!Cache::has(Member::CACHE_KEY)){
            Member::cache_warming();
        }
        $customers = Member::select('members.id as member_id', 'users.name as name', 'users.email as email', 'users.phone as phone', 'members.status as status', 'members.point as point')
        ->join('users', 'users.id', '=', 'members.user_id')->where('role','member')->get();
        return view('customers/customers',[
            'title'         => 'Customer',
            'regulars'      => Member::join('users', 'users.id', '=', 'members.user_id')->where('role','member')->where('status','regular')->get(),
            'customers'     => $customers,
            'members'       => Member::where('status','member')->get(),
            'pendings'      => Member::where('status','pending')->get(),
            'countPending'  => Cache::get(Member::CACHE_KEY.'_count')
        ]);
    }

    public function detail_customer($customer_id) {
        if(!Cache::has(Member::CACHE_KEY)){
            Member::cache_warming();
        }

        if($member = Member::find($customer_id)) {
            $audits = Audit::with('user')
            ->where('auditable_id',$customer_id)
            ->where('user_id','>',0)
            ->where('old_values','LIKE', '%point%')
            ->where('auditable_type','App\Models\Member')
            ->orderBy('created_at', 'desc')->get();

            return view('customers/detail-customer',[
                'title' => 'Detail Customer',
                'audits' => $audits,
                'customer' => $member,
                'countPending' => Cache::get(Member::CACHE_KEY.'_count')
            ]);
        }

        return redirect()->back()->withErrors(['msg' => 'Customer tidak ditemukan']);

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
                'status' => 'required|string',
            ]);

            $member = Member::find($customer_id);
            if($request->status == 'reject'){
                $member->status = 'regular';
                $member->reason = $request->reason;
                $member->code   = '';
            }elseif($request->status == 'member'){
                $member->status = 'member';
                $member->reason = '';
                $member->code   = $request->code;
            }
            $member->save();

            return redirect()->intended('customers')
                                ->withSuccess('Verifikasi Berhasil');
        }
        catch(\Exception $e){
            return redirect()->back()
                        ->withErrors(['msg' => 'Verifikasi Gagal']);
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
                                ->withSuccess('Update Data Berhasil');
        }
        catch(\Exception $e){
            return redirect()->intended('customer/edit/'.$customer_id)
                ->withErrors(['msg' => 'Update Data Gagal']);
        }
    }


    public function delete_customer($customer_id){
        try{
            $user = Auth::user();
            $member = Member::where('id',$customer_id)->first();
            DB::beginTransaction();
            if(in_array($user->role,['admin','operator'])){
                $c_user = $member->user;

                foreach($c_user->addresses as $address){
                    $address->delete();
                }

                $member->delete();
                $c_user->delete();
            }
            DB::commit();
            return redirect()->intended('/customers')->withSuccess('Hapus Data Berhasil');
        }
        catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }
    }
}
