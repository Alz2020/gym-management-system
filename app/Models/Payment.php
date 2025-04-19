<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'user_id',
        'payment_id',
        'amount',
        'status',
    ];
    // Enable timestamps (created_at, updated_at)
    public $timestamps = true;

    /**
     * Get the user who made the payment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
