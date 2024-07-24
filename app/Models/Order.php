<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['quantity', 'customer_acc', 'product_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_acc', 'acc');
    }


    public function good()
    {
        return $this->belongsTo(Good::class, 'product_id', 'id');
    }
}