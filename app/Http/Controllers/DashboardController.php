<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use OwenIt\Auditing\Models\Audit;

class DashboardController extends Controller
{

    public function index()
    {
        if(!Cache::has(Member::CACHE_KEY)){
            Member::cache_warming();
        }

        $customers = Member::select('members.id as member_id', 'users.name as name', 'users.email as email', 'users.phone as phone')
                    ->join('users', 'users.id', '=', 'members.user_id')->where('role','member')->get();
        return view('dashboard', [
            'title' => 'Beranda',
            'customers' => $customers,
            'members' => Member::where('status','member')->get(),
            'countPending' => Cache::get(Member::CACHE_KEY.'_count')
        ]);
    }

    public function logs()
    {
        if(!Cache::has(Member::CACHE_KEY)){
            Member::cache_warming();
        }

        $audits = Audit::with('user')
            ->where('user_id','>',0)
            ->orderBy('created_at', 'desc')->get();

        return view('logs', [
            'title' => 'Logs',
            'audits' => $audits,
            'countPending' => Cache::get(Member::CACHE_KEY.'_count'),
        ]);
    }

    public function list_user() {
        if(!Cache::has(Member::CACHE_KEY)){
            Member::cache_warming();
        }

        return view('users/users',[
            'title' => 'Daftar User',
            'admins' => User::where('role','admin')->get(),
            'operators' => User::where('role','operator')->get(),
            'countPending' => Cache::get(Member::CACHE_KEY.'_count'),
        ]);
    }

}
