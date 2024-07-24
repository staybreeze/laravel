<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Good;
use Illuminate\Support\Facades\Session;

class CartsController extends Controller
{
    public function index()
    {

        $cart = Order::where('customer_acc', session('user'))
            ->orderBy('product_id', 'asc')
            ->get();
        // dd($cart );
        return view('cart', ['cart' => $cart]);
    }

    public function sessionToCart(Request $request)
    {
        if ($request->session()->has('good')) {
            foreach ($request->session()->get('good') as $goodId => $good) {
                $goodId = explode('-', $goodId)[0];
                $existingOrderItem = Order::where('customer_acc', $request->session()->get('user'))
                    ->where('product_id', $goodId)
                    ->first();

                if (!$existingOrderItem) {
                    $orderResult = Order::create([
                        'customer_acc' => $request->session()->get('user'),
                        'product_id' => $goodId,
                        'quantity' => 1,
                    ]);
                } else {
                    $newQuantity = $existingOrderItem->quantity + 1;
                    $existingOrderItem->update(['quantity' => $newQuantity]);
                    $orderResult = $existingOrderItem;
                }
            }
        }
        $goods = Order::where('customer_acc', $request->session()->get('user'))->get();
        foreach ($goods as $good) {
            $request->session()->put('good.' . $good->product_id, 1);
        }

        // dd($goods);

        if ($request->session()->has('user')) {
            if ($request->session()->has('cart')) {
                $request->session()->forget('cart');
                return redirect('cart');
            } else {
                return redirect('member');
            }
        } else {
            return redirect('login')->with('error', '請先登入會員');
        }
    }

    //     public function addToCart(Request $request)
    // {
    //     $id = $request->id;
    //     $currentQuantity = Session::get('good.'.$id, 0);
    //     Session::put('good.'.$id, $currentQuantity + 1);

    //     if (Session::has('user')) {
    //         $goodId = $request->id;
    //         $existingCartItem = Order::where([
    //             'customer_acc' => Session::get('user'), 
    //             'product_id' => $goodId
    //         ])->first();

    //         if (!$existingCartItem) {
    //             Order::create([
    //                 'customer_acc' => Session::get('user'),
    //                 'product_id' => $goodId,
    //                 'quantity' => 1,
    //             ]);
    //         } else {
    //             $existingCartItem->increment('quantity');
    //         }

    //         $good = Good::find($goodId);
    //         $good->decrement('remain');
    //     }

    //     // 根據不同的請求參數重定向到不同的路由
    //     if ($request->has('cart')) {
    //         return redirect()->route('cart.index');
    //     } elseif ($request->has('mobile')) {
    //         return redirect()->route('home.index', ['mobile' => 'onlineStore']);
    //     } elseif ($request->has('query')) {
    //         return redirect()->route('search.index', ['query' => $request->input('query')]);
    //     } else {
    //         return redirect()->route('home.index', ['#' => 'store']);
    //     }
    // }
    public function addToCart(Request $request)
    {
        $id = $request->id;
        $currentQuantity = Session::get('good.'.$id, 0);
        Session::put('good.'.$id, $currentQuantity + 1);

        if (Session::has('user')) {
            $goodId = $request->id;
            $existingCartItem = Order::where([
                'customer_acc' => Session::get('user'),
                'product_id' => $goodId
            ])->first();

            if (!$existingCartItem) {
                Order::create([
                    'customer_acc' => Session::get('user'),
                    'product_id' => $goodId,
                    'quantity' => 1,
                ]);
            } else {
                $existingCartItem->increment('quantity');
            }

            $good = Good::find($goodId);
            $good->decrement('remain');
        }

        // 根據不同的請求參數重定向到不同的路由
        if ($request->has('cart')) {
            return redirect()->route('cart.index');
        } elseif ($request->has('mobile')) {
            return redirect()->route('home.index', ['mobile' => 'onlineStore']);
        } elseif ($request->has('query')) {
            $query = $request->input('query', '');
            return redirect(url('/search?query=' . urlencode($query)));
        } else {
            return redirect('index#store');
        }
    }

public function delete(Request $request, $productId)
{

    $username = Session::get('user');

    $request->session()->forget('good.'.$productId);

    $quantityToDelete = Order::where('product_id', $productId)
    ->where('customer_acc', $username)
    ->sum('quantity'); 

    Order::where('product_id', $productId)
         ->where('customer_acc', $username)
         ->delete();


    $good = Good::find($productId);
    if ($good) {
        $good->remain += $quantityToDelete; 
        $good->save();
    }

    return redirect()->back()->with('success', '商品已成功從購物車和訂單中移除，並且庫存已更新。');
}
}
