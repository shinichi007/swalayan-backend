<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $setting_id
     * @return \Illuminate\Http\Response
     */
    public function show($setting_id)
    {
        if(!Cache::has(Setting::CACHE_KEY)) {
            Cache::put(Setting::CACHE_KEY,Setting::get());
        }

        $setting = Cache::get(Setting::CACHE_KEY)[0];

        $status_code = 200;
        $message = 'List Setting';
        $data = json_decode($setting['value']);
        unset($data->fonnte_token);
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
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $setting_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $setting_id)
    {
        try{
            request()->validate([
                'versi' => 'required|string',
                'url'   => 'required|string',
            ]);

            $setting = Setting::where('id',$setting_id)->first();
            $setting->update([
                'value' => json_encode([
                    'versi' => $request->versi,
                    'url'   => $request->url,
                    'fonnte_token' => $request->fonnte_token
                ]),
            ]);

            return redirect()->intended('dashboard')
                                ->withSuccess('ubah password berhasil');

        }
        catch(\Exception $e){
            return redirect()->intended('dashboard')->withErrors(['msg' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
