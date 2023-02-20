<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function login(Request $request) {
        return view('login');
    }

    public function do_login(Request $request){

        try{
            request()->validate([
                'email'         => 'required|string|email|max:255',
                'password'      => 'required|string|min:6'
            ]);

            $credentials = $request->only('email', 'password');
            $msg = 'Kamu tidak memiliki akses';
            if (Auth::attempt($credentials)) {
                if(in_array(Auth::user()->role,['admin','operator'])){
                    $user = User::where('id',Auth::id())->first();
                    if(is_null($user->remember_token)){
                        $user->remember_token = $user->createToken('auth_token')->plainTextToken;
                        $user->save();
                        return redirect()->intended('dashboard')
                            ->withSuccess('login berhasil');
                    }
                    $msg = 'Akun Kamu sedang login didevice lain';
                }

                Session::flush();
                Auth::logout();

                return redirect()->intended('/')->withErrors(['msg' => $msg]);

            }else{
                return redirect()->intended('/')->withErrors(['msg' => 'Email atau Password Salah']);
            }
        }
        catch(\Exception $e){
            return redirect()->intended('/')->withErrors(['msg' => $e->getMessage()]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if(!Cache::has(Member::CACHE_KEY)){
            Member::cache_warming();
        }

        return view('users/create-user',[
            'title' => 'Tambah User',
            'countPending' => Cache::get(Member::CACHE_KEY.'_count'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create_user(Request $request)
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

            $image_path = $request->file('profile_pic')->store('image', 'public');
            $request->request->add([
                'avatar' => $image_path,
            ]);

            User::create($request->all());

            return redirect()->intended('users')
                                ->withSuccess('Tambah user berhasil');
        }
        catch(\Exception $e){
            return redirect()->intended('users/create')
                ->withErrors(['msg' => $e->getMessage()]);
        }
    }

    public function forgotPassword(Request $request) {
        return view('forgot-password');
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
                    "reason" => $user->member->reason,
                    "code" => $user->member->code,
                    "point" => $user->member->point,
                    "data" => [
                        "address" => $user->member->ktp_address,
                        "nik" => $user->member->nik,
                        "ktp" => request()->getSchemeAndHttpHost().Storage::url($user->member->ktp_img),
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
                    'avatar' => request()->getSchemeAndHttpHost().Storage::url($user->avatar),
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
                    "reason" => $user->member->reason,
                    "code" => $user->member->code,
                    "point" => $user->member->point,
                    "data" => [
                        "address" => $user->member->ktp_address,
                        "nik" => $user->member->nik,
                        "ktp" => request()->getSchemeAndHttpHost().Storage::url($user->member->ktp_img),
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
                'avatar' => request()->getSchemeAndHttpHost().Storage::url($user->avatar),
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
                'gender'    => 'required|string|max:1',
            ]);

            $status_code = 200;
            $user = User::where('id',$user_id)->firstOrFail();

            $user->name = $request->name;
            $user->gender = $request->gender;
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
            $data = request()->getSchemeAndHttpHost().Storage::url($user->avatar);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function change_password(Request $request, $user_id)
    {

        $data = null;
        $status_code = 400;
        try{
            request()->validate([
                'old_password'          => 'required|string|max:255',
                'password'              => 'required|string|min:6',
                'password_confirmation' => 'required_with:password|same:password|min:6'
            ]);

            $user = User::find($user_id);

            if(Hash::check($request->old_password, $user->password)){
                // update user password
                $user->password = Hash::make($request->password);
                $user->save();

                $status_code = 200;
                $message = 'Ubah Kata Sandi Berhasil';
            }
            else{
                $message = 'Kata sandi lama tidak sesuai';
            }
        }
        catch(\Exception $e){
            $status_code = 422;
            $message = $e->getMessage();
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

    /**
     * Show the form for updating resource.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id) {
        if(!Cache::has(Member::CACHE_KEY)){
            Member::cache_warming();
        }

        return view('users/edit-user',[
            'title' => 'Edit User',
            'user' => User::find($user_id),
            'countPending' => Cache::get(Member::CACHE_KEY.'_count'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $user_id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit_user(Request $request, $user_id)
    {

        $this->validate($request, [
            'profile_pic' => 'file|image|mimes:jpeg,png,jpg,png,svg|max:2048',
            'name' => 'required',
        ]);

        $user = User::where('id',$user_id)->first();

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
            return redirect()->back()
                ->withErrors(['msg' => $e->getMessage()]);
        }
    }
}
