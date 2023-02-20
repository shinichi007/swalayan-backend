<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index() {
        if(!Cache::has(Member::CACHE_KEY)){
            Member::cache_warming();
        }
        $user = Auth::user();
        return view('profile', [
            'title' => 'Profil',
            'user' => $user,
            'countPending' => Cache::get(Member::CACHE_KEY.'_count')
        ]);
    }

    public function change_password() {
        if(!Cache::has(Member::CACHE_KEY)){
            Member::cache_warming();
        }
        $user = Auth::user();
        return view('users.change-password', [
            'title' => 'Profil',
            'user' => $user,
            'countPending' => Cache::get(Member::CACHE_KEY.'_count')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function do_change_password(Request $request)
    {
        try{
            request()->validate([
                'old_password'          => 'required|string|max:255',
                'password'              => 'required|string|min:6',
                'password_confirmation' => 'required_with:password|same:password|min:6'
            ]);

            $user = User::find(Auth::id());

            if(Hash::check($request->old_password, $user->password)){
                // update user password
                $user->password = Hash::make($request->password);
                $user->save();

                return redirect()->intended('change-password')
                                ->withSuccess('ubah password berhasil');
            }
            else{
                return redirect()->back()->withErrors(['msg' => 'Password lama tidak sesuai']);
            }

        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'profile_pic' => 'file|image|mimes:jpeg,png,jpg,png,svg|max:2048',
            'name' => 'required',
        ]);

        $user = User::where('id',Auth::id())->first();
        if($request->file('profile_pic')){
            $image_path = $request->file('profile_pic')->store('image', 'public');
            $user->avatar = $image_path;
        }

        try{
            $user->name = $request->name;
            $user->save();

            return redirect()->back();
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }

    }
}
