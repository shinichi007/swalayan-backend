<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        try{

            request()->validate([
                'profile_pic'   => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'name'          => 'required|string|max:255',
                'role'          => 'required|string|max:10',
                'phone'         => 'required|string|min:8|max:18|unique:users',
                'email'         => 'required|string|email|max:255|unique:users',
                'password'      => 'required|string|min:6',
                'password_confirmation' => 'required_with:password|same:password|min:6'
            ]);

            $status_code = 200;
            $image_path = $request->file('profile_pic')->store('image', 'public');
            $request->request->add([
                'avatar' => $image_path,
            ]);

            User::create($request->all());

            $message = 'Create User Success';
            $data = User::latest()->get();
        }
        catch(\Exception $e){
            $status_code = 400;
            $message = $e->getMessage();
            $data = [];
        }

        $respon = [
            'status_code' => $status_code,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($respon, $status_code);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $status_code = 200;
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

            $message = 'Show user Success';
            $data = [
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'role' => $user->role,
                    'phone' => $user->phone,
                    'email' => $user->email,
                    'gender' => $user->gender == 'f' ? 'Wanita':'Laki - Laki',
                    'avatar' => $user->avatar,
                    'address' => $addresses,
                    'member'  => $member,
            ];
        }
        catch(\Exception $e){
            $status_code = 404;
            $message = 'User Not Found';
            $data = [];
        }

        $respon = [
            'status_code' => $status_code,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($respon, $status_code);
    }

/**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function me()
    {
        $user_id = Auth::id();
        $status_code = 200;
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

            $message = 'Show user Success';
            $data = [
                'user_id' => $user->id,
                'role' => $user->role,
                'name' => $user->name,
                'phone' => $user->phone,
                'email' => $user->email,
                'gender' => $user->gender == 'f' ? 'Wanita':'Laki - Laki',
                'avatar' => $user->avatar,
                'address' => $addresses,
                'member'  => $member,
            ];
        }
        catch(\Exception $e){
            $status_code = 404;
            $data = [];
            $message = 'User Not Found';
        }

        $respon = [
            'status_code' => $status_code,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($respon, $status_code);
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
                'role'      => 'required|string|max:10',
            ]);

            $status_code = 200;
            $user = User::where('id',$user_id)->firstOrFail();

            $user->name = $request->name;
            $user->role = $request->role;
            $user->save();

            $message = 'Update Success';
            $data = $user;
        }
        catch(\Exception $e){
            $status_code = 422;
            $data = [
                'message' => $e->getMessage(),
                'data' => [],
            ];
        }

        $respon = [
            'status_code' => $status_code,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($respon, $status_code);
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
            $status_code = 200;
            $image_path = $request->file('profile_pic')->store('image/user', 'public');

            $user = User::where('id',$user_id)->firstOrFail();

            $user->avatar = $image_path;
            $user->save();

            $message = 'Upload profile Success';
            $data = $user;
        }
        catch(\Exception $e){
            $status_code = 422;
            $message = $e->getMessage();
            $data = [];
        }

        $respon = [
            'status_code' => $status_code,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($respon, $status_code);
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
            $status_code = 404;
            $user = User::where('id',$user_id);

            $message = 'User Not Found';
            if($user->count()){
                $status_code = 200;
                $user->delete();
                $message = 'Delete User Success';
            }

            $data = [];
        }
        catch(\Exception $e){
            $status_code = 400;
            $message = $e->getMessage();
            $data = [];
        }

        $respon = [
            'status_code' => $status_code,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($respon, $status_code);
    }
}
