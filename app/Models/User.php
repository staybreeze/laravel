<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'acc',
        'pw',
        'name',
        'address',
        'email',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_acc', 'acc');
    }

    /**
     * Set the user's password.
     *
     * @param  string  $value
     * @return void
     */
    public function setPwAttribute($value)
    {
        // $this->attributes['pw'] = Hash::make($value);
        $this->attributes['pw'] = $value;
        
    }
}