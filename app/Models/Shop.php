<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shop extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'image',
        'description'
    ];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public function customer():HasMany
    {
        return $this->hasMany(Customer::class);
    }
    public function transaction():HasMany
    {
        return $this->hasMany(Transaction::class);
    }
    public function order() :HasMany
    {
        return $this->hasMany(Order::class);
    }
}
