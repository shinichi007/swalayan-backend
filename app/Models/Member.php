<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Member extends Model implements Auditable
{
    use HasFactory, AuditableTrait;

    protected $table = 'members';
    protected $fillable = [
        'user_id',
        'status',
        'code',
        'point',
        'nik',
        'ktp_name',
        'ktp_img',
        'ktp_gender',
        'ktp_dob',
        'ktp_address'
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
