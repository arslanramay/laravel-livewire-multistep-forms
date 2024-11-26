<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subscription_type'
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
