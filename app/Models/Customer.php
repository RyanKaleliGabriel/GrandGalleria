<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'shop_id'
    ];

    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }
    public function transaction(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }
}
