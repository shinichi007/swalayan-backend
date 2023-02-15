<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

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
        return 'a';
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

        try{
            Address::create($request->all());

            $data = [
                'message' => 'create address success',
                'data' => Address::where('user_id',$uid)->get(),
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

            $data = [
                'message' => 'Show Address Success',
                'data' => $address,
            ];
        }
        catch(\Exception $e){
            $data = [
                'message' => 'Address Not Found',
                'data' => [],
            ];
        }

        return response()->json($data);
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
        request()->validate([
            'type'      => 'required',
            'name'      => 'required',
            'default'   => 'required',
            'phone'     => 'required',
            'address'   => 'required',
            'city'      => 'required',
            'zipcode'   => 'required',
        ]);

        try{
            $address->update($request->all());

            $data = [
                'message' => 'Update address success',
                'data' => Address::where('user_id',Auth::id())->get(),
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
     * @param  int  $address_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($address_id)
    {
        try{
            $address = Address::where('id',$address_id);

            $message = 'Address Not Found';
            if($address->count()){
                $address->delete();
                $message = 'Delete address success';
            }

            $data = [
                'message' => $message,
                'data' => Address::where('user_id',Auth::id())->get(),
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
