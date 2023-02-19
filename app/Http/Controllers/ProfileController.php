<?php

namespace App\Http\Controllers;
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        try{
            request()->validate([
                'name'      => 'required|string|max:255',
                'gender'    => 'required|string|max:1',
            ]);

            if($user_id > 0){
                $user = User::find($user_id);
            }else{
                $user = Auth::user();
            }
        }
        catch(\Exception $e){

        }
    }
}
