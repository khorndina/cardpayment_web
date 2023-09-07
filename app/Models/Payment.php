<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'mid',
        'orderId',
        'sessionId',
        'pan',
        'exp',
        'amount',
        'payment_type',
    ];
}
