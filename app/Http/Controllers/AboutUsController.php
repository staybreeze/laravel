<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUsData = AboutUs::first();
        return view('about_us', ['about' => $aboutUsData]);
    }

    public function backIndex()
    {
        $aboutUsData = AboutUs::first();
        return view('back.about_us', ['about' => $aboutUsData]);
    }
    
    public function update(Request $request)
    {
        if ($request->hasFile('img')) {
            Log::debug('文件存在');
        } else {
            Log::debug('文件不存在');
        }
        $aboutUs = AboutUs::firstOrFail();
        $data = $request->only(['origin', 'goal', 'cheetos']);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $targetPath = public_path('img');
            
            if (!file_exists($targetPath)) {
                mkdir($targetPath, 0777, true);
            }

            try {
                $file->move($targetPath, $filename);
                $data['img'] = $filename;
            } catch (\Exception $e) {
                Log::error("圖片上傳失敗: " . $e->getMessage());
                return redirect()->back()->with('error', '圖片上傳失敗');
            }
        }

        $aboutUs->update($data);
        return redirect()->back()->with('success', '關於我們更新成功');
    }
}