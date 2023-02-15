<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Address extends Model implements Auditable
{
    use HasFactory, AuditableTrait;

    protected $table = 'addresses';
    protected $fillable = ['user_id','type', 'name', 'default', 'phone', 'address', 'city', 'zipcode'];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    /**
     * Scope a query to only include active pages.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return void
     */
    public function scopeDefault($query, $default)
    {
        $query->where('default', $default);
    }
}
