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

    /**
     * Define the relationship to the address.
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    /**
     * Define the relationship to the payment.
     */
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
