<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Models\Good;
use Illuminate\Http\Request;
use App\Http\Resources\GoodResource;
use Illuminate\Support\Facades\Storage;
use App\Models\Order;

class GoodsController extends Controller
{
    public function index()
    {
        $goods = Good::all();
        return view('index', ['goods' => GoodResource::collection($goods)]);
    }

    public function backIndex()
    {  
        $perPage = 3; 
        $goods = Good::paginate($perPage); 
    
        $goods->appends(['do' => 'goods']);

        return view('back.goods', ['goods' => $goods]);
    }

    public function showGoods()
    {
        $perPage = 3; 
        $goods = Good::paginate($perPage); 
    
        $goods->appends(['do' => 'goods']);

        return view('back.goods', ['goods' => $goods]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'discount' => 'nullable|numeric',
            'old_price' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'quantity' => 'required|integer',
            'like_item' => 'nullable|boolean',
            'remain' => 'nullable|integer',
            'img' => 'nullable|image|max:2048', 
        ]);
    
        $good = new Good();
    
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $targetPath = public_path('img');
            $file->move($targetPath, $filename);
            $good->img = 'img/' . $filename; 
        }else{
            $good->img = null;
        }
    
        $good->name = $validated['name'];
        $good->new = $request->has('new') ? 1 : 0;
        $good->discount = $validated['discount'];
        $good->old_price = $validated['old_price'];
        $good->quantity = $validated['quantity'];
        $good->like_item = $request->has('like_item') ? 1 : 0;
        $good->remain = $validated['remain'];
    
        if (isset($validated['discount']) && isset($validated['old_price'])) {
            $good->price = (1 - ($validated['discount'] / 100)) * $validated['old_price'];
        } else {
            $good->price = 0; 
        }

        if ($good->save()) {
            return redirect()->back()->with('success', '商品新增成功。');
        } else {
            return redirect()->back()->with('error', '商品新增失敗。');
        }
    }
    

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'discount' => 'nullable|numeric',
            'old_price' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'quantity' => 'required|integer',
            'like_item' => 'nullable|boolean',
            'remain' => 'nullable|integer',
            'img' => 'nullable|image|max:2048', 
        ]);
    
        $good = Good::find($id);
        if (!$good) {
            return redirect()->back()->with('error', '找不到商品。');
        }
    
        if ($request->hasFile('img')) {
            if ($good->img && Storage::exists('public/img/' . $good->img)) {
                Storage::delete('public/img/' . $good->img);
            }
    
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $targetPath = public_path('img');
            $file->move($targetPath, $filename);
            $good->img = 'img/' . $filename; 
        }
    
        $good->name = $validated['name'];
        $good->new = $request->has('new') ? 1 : 0;
        $good->discount = $validated['discount'];
        $good->old_price = $validated['old_price'];
        $good->quantity = $validated['quantity'];
        $good->like_item = $request->has('like_item') ? 1 : 0;
        $good->remain = $validated['remain'];
    
        if (isset($validated['discount']) && isset($validated['old_price'])) {
            $good->price = (1 - ($validated['discount'] / 100)) * $validated['old_price'];
        } else {
            $good->price = 0; 
        }
    
        if ($good->save()) {
            return redirect()->back()->with('success', '商品更新成功。');
        } else {
            return redirect()->back()->with('error', '商品更新失败。');
        }
    }
    

    public function delete($id)
    {
        $good = Good::findOrFail($id);
        
        if($good->delete()){
            return redirect()->back()->with('success', '商品刪除成功。');
        }else{
            return redirect()->back()->with('error', '商品刪除失敗。');
            }
    }
    public function addLike(Request $request)
    {
        $productId = $request->id;
        $good = Good::find($productId);

        if (!$good) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $likedProducts = session('liked_products', []);

        if (in_array($productId, $likedProducts)) {
            $index = array_search($productId, $likedProducts);
            unset($likedProducts[$index]);
            $good->like_item--;
        } else {
            $likedProducts[] = $productId;
            $good->like_item++;
        }

        session(['liked_products' => $likedProducts]);

        $good->save();

        return response()->json(['message' => 'Success', 'liked_products' => $likedProducts]);
    }
}
