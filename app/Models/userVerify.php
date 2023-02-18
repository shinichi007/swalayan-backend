<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class userVerify extends Model
{
    use HasFactory;

    public $table = "user_verifies";

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'user_id',
        'is_used',
        'otp',
        'expired_time',
    ];

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include active pages.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return void
     */
    public function scopeActive($query)
    {
        $query->where('is_used',false)->where('expired_time', '>=', Carbon::now("Asia/Jakarta"));
    }

    public static function sendMail($receiver, $otp, $expired_time){
        $response = Mail::send('emails.emailVerificationEmail', ['otp' => $otp, 'expired_time' => $expired_time], function($message) use($receiver){
            $message->to($receiver);
            $message->subject('Email Verification Code');
        });

        return $response;
    }

    public static function sendWA($phone,$message){
        $setting = Setting::where('name','fonnte_token')->first();
        $response = Http::asForm()->withHeaders([
            'Authorization' => $setting->value
        ])->post('https://api.fonnte.com/send', [
            'target' => $phone,
            'message' => $message,
        ]);

        return $response;
    }
}
