<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Resources\GoodResource;
use Illuminate\Support\Facades\Storage;

class OrdersController extends Controller
{
    public function backIndex()
    {  
        $perPage = 70;
       
        $orders = Order::with(['user', 'good'])->paginate($perPage);
        // dd($orders);
        $users = $orders->pluck('user')->unique('id');
        // dd($users);
        $orders->appends(['do' => 'orders']);
    
        return view('back.orders', ['orders' => $orders, 'users' => $users]);
    }
    
    }

