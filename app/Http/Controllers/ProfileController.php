<?php

namespace App\Http\Controllers;
use App\Models\Customer;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        return view('profile', [
            'title' => 'Profil',
            'countPending' => Customer::countPending()
        ]);
    }
}
