<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use UUID;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'logo',
        'description',
        'phone',
        'email',
        'address_id',
        'address',
        'city',
        'country',
        'latitude',
        'longitude',
        'is_active',
        'is_verified',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_verified' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ballance()
    {
        return $this->hasOne(StoreBallance::class);
    }
}
