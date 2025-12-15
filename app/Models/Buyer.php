<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $fillable = [
        'user_id',
        'profile_picture',
        'phone_number',
    ];

    protected $casts = [
        'profile_picture' => 'string',
        'phone_number' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
