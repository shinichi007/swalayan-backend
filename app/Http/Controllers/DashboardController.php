<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Member;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'title' => 'Beranda',
            'customers' => Member::where('status','regular')->orWhere('status','pending')->get(),
            'members' => Member::where('status','member')->get(),
            'countPending' => count(Member::where('status','pending')->get())
        ]);
    }

    public function logs()
    {
        return view('logs', [
            'title' => 'Logs',
            'countPending' => Customer::countPending()
        ]);
    }
}
