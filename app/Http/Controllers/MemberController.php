<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        request()->validate([
            'nik'           => 'required|string|min:1|max:17|unique:members',
            'ktp_name'      => 'required',
            'ktp_gender'    => 'required',
            'ktp_dob'       => 'required',
            'ktp_address'   => 'required',
        ]);

        try{
            // $filename = 'ktp_'.$uid.'.'.$request->ktp_photo->extension();
            // $request->ktp_photo->move(public_path('uploads/ktp'), $filename);
            $filename = 'ktp_'.$uid.'.jpg';
            $request->request->add([
                'ktp_img' => 'uploads/ktp/'.$filename,
                'code'  => Member::generate_code($uid),
                'point'  => 0
            ]);

            Member::create($request->all());

            $data = [
                'message' => 'Create Member Success',
                'data' => Member::where('user_id',$uid)->get(),
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
     * @param  int  $member_id
     * @return \Illuminate\Http\Response
     */
    public function show($member_id)
    {
        try{
            $member = Member::select(
                'nik',
                'status',
                'ktp_name',
                'ktp_gender',
                'ktp_dob',
                'ktp_address',
                'user_id',)
                ->where('id',$member_id)->firstOrFail();

            $data = [
                'message' => 'Show member Success',
                'data' => $member,
            ];
        }
        catch(\Exception $e){
            $data = [
                'message' => 'member Not Found',
                'data' => [],
            ];
        }

        return response()->json($data);
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
        request()->validate([
            'nik'           => 'required|string|min:1|max:17|unique:members',
            'ktp_name'      => 'required',
            'ktp_gender'    => 'required',
            'ktp_dob'       => 'required',
            'ktp_address'   => 'required',
            'code'          => 'required',
            'point'         => 'required',
        ]);

        try{
            $member = $member->update($request->all());

            $data = [
                'message' => 'Update member success',
                'data' => $member,
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
     * @param  int  $member_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($member_id)
    {
        try{
            $member = Member::where('id',$member_id);

            $message = 'Member Not Found';
            if($member->count()){
                $member->delete();
                $message = 'Delete Member Success';
            }

            $data = [
                'message' => $message,
                'data' => Member::where('user_id',Auth::id())->get(),
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
