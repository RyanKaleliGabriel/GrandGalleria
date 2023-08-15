<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderproduct extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'order_id', 'product_id', 'quantity', 'shop_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
