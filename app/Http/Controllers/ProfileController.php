<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        // $user = Auth::user();
        $user = User::find(1);
        return view('profile', [
            'title' => 'Profil',
            'user' => $user,
            'countPending' => Member::where('status','pending')->get()->count()
        ]);
    }
}
