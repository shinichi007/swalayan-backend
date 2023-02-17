<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        // return view('users/users',[
        //     'title' => 'Daftar User',
        //     'countPending' => Customer::countPending()
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'profile_pic'   => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'name'          => 'required|string|max:255',
            'role'          => 'required|string|max:10',
            'phone'         => 'required|string|min:8|max:18|unique:users',
            'email'         => 'required|string|email|max:255|unique:users',
            'password'      => 'required|string|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);

        try{
            $image_path = $request->file('profile_pic')->store('image', 'public');
            $request->request->add([
                'avatar' => $image_path,
            ]);

            User::create($request->all());

            $data = [
                'message' => 'Create User Success',
                'data' => User::latest()->get(),
            ];
        }
        catch(\Exception $e){
            $data = [
                'message' => $e->getMessage(),
                'data' => [],
            ];
        }

        return response()->json($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        try{
            $user = User::where('id',$user_id)->firstOrFail();

            $member = [];
            if($user->member){
                $member = [
                    "member_id" => $user->member->id,
                    "status" => $user->member->status,
                    "code" => $user->member->code,
                    "point" => $user->member->point,
                    "data" => [
                        "address" => $user->member->ktp_address,
                        "nik" => $user->member->nik,
                        "ktp" => $user->member->ktp_img,
                        "ktp_name" => $user->member->ktp_name,
                        "gender" => $user->member->ktp_gender == 'f' ? 'Wanita':'Laki - Laki',
                        "dob" => $user->member->ktp_dob,
                    ]
                ];
            }

            $addresses = [];
            if(count($user->addresses) > 0){
                $addresses = $user->addresses;
            }

            $data = [
                'message' => 'Show user Success',
                'data' => [
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'role' => $user->role,
                    'phone' => $user->phone,
                    'email' => $user->email,
                    'gender' => $user->gender == 'f' ? 'Wanita':'Laki - Laki',
                    'avatar' => $user->avatar,
                    'address' => $addresses,
                    'member'  => $member,
                ],
            ];
        }
        catch(\Exception $e){
            $data = [
                'message' => 'User Not Found',
                'data' => [],
            ];
        }

        return response()->json($data);
    }

/**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function me()
    {
        $user_id = Auth::id();
        try{
            $user = User::where('id',$user_id)->firstOrFail();

            $member = null;
            if($user->member){
                $member = [
                    "member_id" => $user->member->id,
                    "status" => $user->member->status,
                    "code" => $user->member->code,
                    "point" => $user->member->point,
                    "data" => [
                        "address" => $user->member->ktp_address,
                        "nik" => $user->member->nik,
                        "ktp" => $user->member->ktp_img,
                        "ktp_name" => $user->member->ktp_name,
                        "gender" => $user->member->ktp_gender == 'f' ? 'Wanita':'Laki - Laki',
                        "dob" => $user->member->ktp_dob,
                    ]
                ];
            }

            $addresses = null;
            if(count($user->addresses) > 0){
                $addresses = $user->addresses;
            }

            $data = [
                'message' => 'Show user Success',
                'data' => [
                    'user_id' => $user->id,
                    'role' => $user->role,
                    'name' => $user->name,
                    'phone' => $user->phone,
                    'email' => $user->email,
                    'gender' => $user->gender == 'f' ? 'Wanita':'Laki - Laki',
                    'avatar' => $user->avatar,
                    'address' => $addresses,
                    'member'  => $member,
                ],
            ];
        }
        catch(\Exception $e){
            $data = [
                'message' => 'User Not Found',
                'data' => [],
            ];
        }

        return response()->json($data);
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
        request()->validate([
            'name'      => 'required|string|max:255',
            'role'      => 'required|string|max:10',
        ]);

        try{
            $user = User::where('id',$user_id)->firstOrFail();

            $user->name = $request->name;
            $user->role = $request->role;
            $user->save();

            $data = [
                'message' => 'Update Success',
                'data' => $user,
            ];
        }
        catch(\Exception $e){
            $data = [
                'message' => $e->getMessage(),
                'data' => [],
            ];
        }

        return response()->json($data);
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function update_avatar(Request $request, $user_id)
    {
        request()->validate([
            'profile_pic'   => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        try{
            $image_path = $request->file('profile_pic')->store('image/user', 'public');

            $user = User::where('id',$user_id)->firstOrFail();

            $user->avatar = $image_path;
            $user->save();

            $data = [
                'message' => 'Upload profile Success',
                'data' => $user,
            ];
        }
        catch(\Exception $e){
            $data = [
                'message' => $e->getMessage(),
                'data' => [],
            ];
        }

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        try{
            $user = User::where('id',$user_id);

            $message = 'User Not Found';
            if($user->count()){
                $user->delete();
                $message = 'Delete User Success';
            }

            $data = [
                'message' => $message,
                'data' => [],
            ];
        }
        catch(\Exception $e){
            $data = [
                'message' => $e->getMessage(),
                'data' => [],
            ];
        }

        return response()->json($data);
    }
}
