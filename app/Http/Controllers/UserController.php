<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\User;
use App\Models\userVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function resetPassword($token) {
        $otp = base64_decode($token);
        if(userVerify::where('otp',$otp)->active()->get()->count() > 0){
            return view('reset-password',[
                'otp' => $otp,
                'token' => $token
            ]);
        }

        return redirect()->intended('/')
                ->withErrors(['msg' => 'Link sudah tidak Valid']);
    }

    public function do_resetPassword(Request $request, $token) {
        $otp = base64_decode($token);

        try{
            request()->validate([
                'otp'                   => 'required|string|min:6',
                'password'              => 'required|string|min:6',
                'password_confirmation' => 'required_with:password|same:password|min:6'
            ]);
            // find the code
            if ($verify = userVerify::where('otp',$request->otp)->active()->first()) {
                $user = $verify->user;
                // update user password
                $user->password = Hash::make($request->password);
                $user->save();
                $verify->delete();
                return redirect()->intended('/')->withSuccess('Reset Password berhasil');
            }
            else{
                return redirect()->intended('/')->withErrors(['msg' => 'Link sudah tidak Valid']);
            }
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }
    }

    public function forgotPassword() {
        return view('forgot-password');
    }

    public function do_forgotPassword(Request $request) {
        try{
            $this->validate($request, [
                'email' => 'required|email',
            ]);

            if($user = User::where('email',$request->email)->first()){
                $otp = random_int(100000,999999);
                $exp_time = Carbon::now("Asia/Jakarta")->addMinutes(5);
                $expired_time = $exp_time->format('Y-m-d H:i:s');

                userVerify::create([
                    'user_id'       => $user->id,
                    'otp'           => $otp,
                    'is_used'       => false,
                    'expired_time'  => $expired_time,
                ]);

                $receiver = $request->email;

                Mail::send('emails.emailForgotPassword', ['otp' => base64_encode($otp), 'expired_time' => $expired_time], function($message) use($receiver){
                    $message->to($receiver);
                    $message->subject('Email Forgot Password');
                });

                return redirect()->back()->withSuccess('Silahkan Cek Email Kamu');

            }
            else{
                return redirect()->back()->withErrors(['msg' => 'Akun atau email tidak ditemukan']);
            }

        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }
    }

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
                    if(is_null($user->active_token)){
                        $user->active_token = $user->createToken('auth_token')->plainTextToken;
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

            User::create([
                'name'      => $request->name,
                'avatar'    => $image_path,
                'role'      => $request->role,
                'phone'     => $request->phone,
                'email'     => $request->email,
                'password'  => Hash::make($request->password)
             ]);

            return redirect()->intended('users')
                                ->withSuccess('Tambah user berhasil');
        }
        catch(\Exception $e){
            return redirect()->intended('users/create')
                ->withErrors(['msg' => $e->getMessage()]);
        }
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

            return redirect()->back()->withSuccess('Edit User berhasil');
        }
        catch(\Exception $e){
            return redirect()->back()
                ->withErrors(['msg' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function delete_user($user_id)
    {

        try{
            DB::beginTransaction();
            $user = User::where('id',$user_id)->first();
            if(in_array(Auth::user()->role,['admin'])){

                if($member = $user->member){
                    $member->delete();
                }

                if(count($user->addresses) > 0){
                    foreach($user->addresses as $address){
                        $address->delete();
                    }
                }
                $user->delete();
            }
            DB::commit();
            return redirect()->back()->withSuccess('Delete user berhasil');
        }
        catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }
    }
}
