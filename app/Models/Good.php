<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img',
        'new',
        'discount',
        'old_price',
        'price',
        'quantity',
        'like_item',
        'remain',
    ];

    protected $casts = [
        'new' => 'integer',
        'discount' => 'integer',
        'old_price' => 'integer',
        'price' => 'integer',
        'quantity' => 'integer',
        'like_item' => 'integer',
        'remain' => 'integer',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id', 'id');
    }
}
