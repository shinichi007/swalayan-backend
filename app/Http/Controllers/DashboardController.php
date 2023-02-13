<?php

namespace App\Http\Controllers;
use App\Models\Customer;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'title' => 'Beranda',
            'customers' => Customer::regular(),
            'members' => Customer::member(),
            'countCustomer' => Customer::countCustomer(),
            'countMember' => Customer::countMember(),
            'countPending' => Customer::countPending()
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
