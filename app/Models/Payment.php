<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'subscriber_id',
        'card_number',
        'expiry_date',
        'cvv',
    ];

    // Mutator to store card number in a hashed/encrypted format
    public function setCardNumberAttribute($value)
    {
        $this->attributes['card_number'] = encrypt($value);
    }

    // Accessor to decrypt the card number when retrieved
    public function getCardNumberAttribute($value)
    {
        return decrypt($value);
    }

    public function subscriber()
    {
        return $this->belongsTo(Subscriber::class);
    }
}
