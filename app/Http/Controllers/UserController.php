<?php

namespace App\Http\Controllers;
use App\Models\Customer;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('users/users',[
            'title' => 'Daftar User',
            'countPending' => Customer::countPending()
        ]);
    }
}
