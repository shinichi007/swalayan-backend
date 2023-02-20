<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Member extends Model implements Auditable
{
    use HasFactory, AuditableTrait;

    const CACHE_KEY = 'member_list';

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function ($menu) {
            self::cache_warming();
        });

        static::updated(function ($menu){
            self::cache_warming();
        });

        static::deleted(function($menu){
            self::cache_warming();
        });
    }

    protected $table = 'members';
    protected $fillable = [
        'user_id',
        'status',
        'reason',
        'code',
        'point',
        'nik',
        'ktp_name',
        'ktp_img',
        'ktp_gender',
        'ktp_dob',
        'ktp_address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public static function generate_code($uid){
        $code = $uid.random_int(100000, 999999);
        if(Member::where('code',$code)->count()){
            $code = Member::generate_code($uid);
        }
        return $code;
    }

    public static function cache_warming() {
        Cache::forget(Member::CACHE_KEY);
        Cache::put(Member::CACHE_KEY, Member::get());

        Cache::forget(Member::CACHE_KEY.'_count');
        Cache::put(Member::CACHE_KEY.'_count', Member::where('status','pending')->get()->count());
    }
}
