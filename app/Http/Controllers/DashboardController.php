<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Member;
use App\Models\User;

class DashboardController extends Controller
{

    public function index()
    {
        return view('dashboard', [
            'title' => 'Beranda',
            'customers' => Member::where('status','regular')->orWhere('status','pending')->get(),
            'members' => Member::where('status','member')->get(),
            'countPending' => Member::where('status','pending')->get()->count()
        ]);
    }

    public function logs()
    {
        return view('logs', [
            'title' => 'Logs',
            'countPending' => Member::where('status','pending')->get()->count()
        ]);
    }

    public function list_user() {
        return view('users/users',[
            'title' => 'Daftar User',
            'admins' => User::where('role','admin')->get(),
            'operators' => User::where('role','operator')->get(),
            'countPending' => Member::where('status','pending')->get()->count(),
        ]);
    }

}
