<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPESA extends Model
{
    use HasFactory;

    /**
     * stop the autoincrement
     */
    public $incrementing = false;

    /**
     * type of auto-increment
     *
     * @string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference_number',
        'transaction_number',
        'phone_number',
        'order_id',
        'amount',
        'payload',
        'attempts',
        'payload',
        'is_paid',
        'is_withdrawn',
        'is_initiated',
        'is_successful',
        'queued_at',
        'callback_received_at',
    ];

    /**
     * create casts
     */
    protected $casts = [
        'payload' => 'array'
    ];
}
