<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{

    protected $table = 'user';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function isAdmin(): bool
    {
        return $this->role === 'ROLE_ADMIN';
    }

}
