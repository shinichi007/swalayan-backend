<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $members = Member::latest();
        return response()->json($members->paginate(10));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uid = Auth::id();
        $request->request->add([
            'user_id' => $uid,
            'status' => 'pending'
        ]);

        try{

            request()->validate([
                'nik'           => 'required|string|min:1|max:17|unique:members',
                'ktp_photo'     => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'ktp_name'      => 'required',
                'ktp_gender'    => 'required',
                'ktp_dob'       => 'required',
                'ktp_address'   => 'required',
            ]);

            $image_path = $request->file('ktp_photo')->store('image', 'public');
            $request->request->add([
                'ktp_img' => $image_path,
                'code'  => null,
                'point'  => 0
            ]);

            Member::create($request->all());

            $status_code = 200;
            $message = 'Create Member Success';
            $data = Member::where('user_id',$uid)->get();
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
     * @param  int  $member_id
     * @return \Illuminate\Http\Response
     */
    public function show($member_id)
    {
        try{
            $member = Member::where('id',$member_id)->firstOrFail();

            $user = $member->user;
            $addresses = $user->addresses;

            $status_code = 200;
            $message = 'Show member Success';
            $data = [
                'user_id' => $user->id,
                'name' => $user->name,
                'phone' => $user->phone,
                'email' => $user->email,
                'gender' => $user->gender == 'f' ? 'Wanita':'Laki - Laki',
                'avatar' => request()->getSchemeAndHttpHost().Storage::url($user->avatar),
                'address' => $addresses,
                'member'  => [
                    "member_id" => $member->id,
                    "status" => $member->status,
                    "code" => $member->code,
                    "point" => $member->point,
                    "data" => [
                        "address" => $member->ktp_address,
                        "nik" => $member->nik,
                        "ktp" => request()->getSchemeAndHttpHost().Storage::url($member->ktp_img),
                        "ktp_name" => $member->ktp_name,
                        "gender" => $member->ktp_gender == 'f' ? 'Wanita':'Laki - Laki',
                        "dob" => $member->ktp_dob,
                    ]
                ],
            ];
        }
        catch(\Exception $e){
            $status_code = 404;
            $message = 'member Not Found';
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        try{
            request()->validate([
                'nik'           => 'required|string|min:1|max:17|unique:members',
                'ktp_name'      => 'required',
                'ktp_gender'    => 'required',
                'ktp_dob'       => 'required',
                'ktp_address'   => 'required',
                'code'          => 'required',
                'point'         => 'required',
            ]);

            $member = $member->update($request->all());
            $status_code = 200;
            $message = 'Update member success';
            $data = $member;
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
     * Remove the specified resource from storage.
     *
     * @param  int  $member_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($member_id)
    {
        try{
            $member = Member::where('id',$member_id);

            $status_code = 404;
            $message = 'Member Not Found';
            if($member->count()){
                $status_code = 200;
                $member->delete();
                $message = 'Delete Member Success';
            }

            $data = Member::where('user_id',Auth::id())->get();
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
