<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Shop extends Authenticatable
{
    use HasFactory;

    protected $table = 'shops';

    protected $fillable =
    [
        'name',
        'image',
        'email',
        'password',
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
    public function category() :HasMany
    {
        return $this->hasMany(Category::class);
    }
    public function notification(): HasMany
    {
        return $this->hasMany(Notification::class);
    }
}
