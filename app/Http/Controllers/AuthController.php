<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\userVerify;
use DateTime;
use DateTimeZone;

class AuthController extends Controller
{
    public function login(Request $request) {
        return view('login');
    }

    public function register(Request $request) {
        return view('register');
    }

    public function forgotPassword(Request $request) {
        return view('forgot-password');
    }

    public function do_register(Request $request)
    {
        $status_code = 400;
        try{
            $validator = Validator::make($request->all(),[
                'name'                  => 'required|string|max:255',
                'phone'                 => 'required|string|min:8|max:18|unique:users',
                'email'                 => 'required|string|email|max:255|unique:users',
                'password'              => 'required|string|min:6',
                'password_confirmation' => 'required_with:password|same:password|min:6'
            ]);

            if($validator->fails()){
                return response()->json($validator->errors(), $status_code);
            }

            $user = User::create([
                'name'      => $request->name,
                'phone'     => $request->phone,
                'email'     => $request->email,
                'password'  => Hash::make($request->password)
             ]);

            $token = $user->createToken('auth_token')->plainTextToken;

            $status_code = 200;
            $message = 'Register Success';
            $data = $user;
        }
        catch(\Exception $e){
            $data = null;
            $message = $e->getMessage();
        }

        $respon = [
            'status_code'   => $status_code,
            'data'          => $data,
            'message'       => $message,
        ];

        return response()->json($respon, $status_code);
    }

    public function do_login(Request $request)
    {
        $status_code = 400;
        try{
            $validator = Validator::make($request->all(),[
                'account'     => 'required|string|max:255',
                'password'  => 'required|string|min:6',
            ]);

            if($validator->fails()){
                return response()->json($validator->errors(), $status_code);
            }

            $user = User::where('email',$request->account)->orWhere('phone',$request->account)->firstOrFail();

            if($user){
                $request->request->add([
                    'email' => $user->email,
                ]);

                if (!Auth::attempt($request->only('email', 'password')))
                {
                    return response()
                        ->json(['message' => 'Unauthorized'], 401);
                }

                $otp = random_int(100000,999999);
                $expired_time = new DateTime('+5 minutes', new DateTimeZone('Asia/Jakarta'));

                UserVerify::create([
                    'user_id'       => Auth::id(),
                    'otp'           => $otp,
                    'is_used'       => false,
                    'expired_time'  => $expired_time->format('Y-m-d H:i:s'),
                ]);

                Mail::send('emails.emailVerificationEmail', ['otp' => $otp, 'expired_time' => $expired_time->format('Y-m-d H:i:s')], function($message) use($request){
                    $message->to($request->email);
                    $message->subject('Email Verification Code');
                });

                // $user = User::where('email', $request['email'])->firstOrFail();

                // $token = $user->createToken('auth_token')->plainTextToken;

                $status_code = 200;
                $message = "Login Success, Please Input OTP";
                $data = null;
            }
        }
        catch(\Exception $e){
            $data = null;
            $message = $e->getMessage();
        }

        $respon = [
            'status_code'   => $status_code,
            'data'          => $data,
            'message'       => $message,
        ];

        return response()->json($respon, $status_code);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function verifyAccount(Request $request)
    {
        $status_code = 400;
        $message = 'Sorry your account cannot be identified.';
        $data = null;
        $token = null;

        try{
            request()->validate([
                'otp'   => 'required|string',
            ]);

            $user_verify = userVerify::where('otp', $request->otp)->where('is_used',false)->first();

            if($user_verify){
                $status_code = 200;
                $message = 'Verify Success';
                $user = $user_verify->user;

                // Update otp to used
                $user_verify->is_used = true;
                $user_verify->save();

                $token = $user->createToken('auth_token')->plainTextToken;
                $data = [
                    'user_id'   => $user->id,
                    'role'      => $user->role,
                    'name'      => $user->name,
                    'phone'     => $user->phone,
                    'email'     => $user->email,
                    'gender'    => $user->gender == 'f' ? 'Wanita':'Laki - Laki',
                    'avatar'    => $user->avatar
                ];
            }
        }
        catch(\Exception $e){
            $message = $e->getMessage();
        }

        $respon = [
            'message'       => $message,
            'access_token'  => $token,
            'token_type'    => 'Bearer',
            'data'          => $data,
        ];

        return response()->json($respon, $status_code);
    }

    // method for user logout and delete token
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }
}
