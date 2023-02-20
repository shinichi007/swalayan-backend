<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Setting extends Model implements Auditable
{
    use HasFactory, AuditableTrait;

    const CACHE_KEY = 'setting_list';

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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'value', 'user_id'
    ];

    protected static function cache_warming() {
        Cache::forget(Setting::CACHE_KEY);
        $settings = Setting::Select('id','name','value')->get();
        Cache::put(Setting::CACHE_KEY, $settings);
    }

}
