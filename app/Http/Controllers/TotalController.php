<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Total;

class TotalController extends Controller
{
    public function backIndex()
    {
        return view('back.total');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'total' => 'required|numeric',
        ]);

        $total = Total::first();
        if (!$total) {
            $total = new Total();
        }
        $total->total = $validatedData['total'];
        $total->save();

        return redirect()->back()->with('success', '進站人數更新成功');
    }
}