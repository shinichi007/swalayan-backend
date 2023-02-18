<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $addresses = Address::select(
            'id',
            'type',
            'name',
            'default',
            'phone',
            'address',
            'city',
            'zipcode as zip')->latest();
        $data = [
            'message' => 'success',
            'data' => $addresses->where('user_id',Auth::id())->get(),
        ];
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $request->request->add(['user_id' => $uid]);

        try{
            request()->validate([
                'user_id'   => 'required',
                'type'      => 'required',
                'name'      => 'required',
                'default'   => 'required',
                'phone'     => 'required',
                'address'   => 'required',
                'city'      => 'required',
                'zipcode'   => 'required',
            ]);

            if($request->default){
                Address::where('user_id',$uid)->where('default',true)->update(["default" => false]);
            }

            Address::create($request->all());

            $status_code = 200;
            $message = 'create address success';
            $data = Address::where('user_id',$uid)->get();
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
     * @param  int  $address_id
     * @return \Illuminate\Http\Response
     */
    public function show($address_id)
    {
        try{
            $address = Address::select(
                'id',
                'type',
                'name',
                'default',
                'phone',
                'address',
                'city',
                'zipcode as zip')
                ->where('id',$address_id)->firstOrFail();

            $status_code = 200;
            $message = 'Show Address Success';
            $data = $address;
        }
        catch(\Exception $e){
            $status_code = 404;
            $message = 'Address Not Found';
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
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        try{
            request()->validate([
                'type'      => 'required',
                'name'      => 'required',
                'default'   => 'required',
                'phone'     => 'required',
                'address'   => 'required',
                'city'      => 'required',
                'zipcode'   => 'required',
            ]);

            if($request->default){
                Address::where('user_id',Auth::id())->where('default',true)->update(["default" => false]);
            }

            $address->update($request->all());

            $status_code = 200;
            $message = 'Update address success';
            $data = Address::where('user_id',Auth::id())->get();
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
     * @param  int  $address_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($address_id)
    {
        try{
            $address = Address::where('id',$address_id);

            $status_code=404;
            $message = 'Address Not Found';
            if($address->count()){
                $status_code=200;
                $address->delete();
                $message = 'Delete address success';
            }

            $data = Address::where('user_id',Auth::id())->get();
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
