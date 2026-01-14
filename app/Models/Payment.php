<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'booking_id',
        'user_id',
        'amount',
        'payment_method',
        'status',
        'transaction_id',
        'payment_gateway',
        'payment_data',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'payment_data' => 'json',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function mapBookingStatus(string $paymentStatus): string
    {
        return match ($paymentStatus) {
            'completed' => 'confirmed',
            'refunded' => 'cancelled',
            'failed' => 'cancelled',
            default => 'pending',
        };
    }
}
