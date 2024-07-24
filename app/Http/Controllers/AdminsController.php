<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminsController extends Controller
{
    public function backIndex()
    {  
        $admins = Admin::all(); 
        return view('back.admins', ['admins' => $admins]);
    }

    public function create(Request $request)
    {
        Log::info('新增會員請求', ['data' => $request->all()]); 

        if (empty($request['acc']) || empty($request['pw'])) {
            Log::warning('帳號或密碼未提供', ['acc' => $request['acc'] ?? null]);
            return redirect()->back()->with('error', '必須提供帳號或密碼');
        }


        $admin = new Admin();
    
        $admin->acc = $request['acc'];
        $admin->pw = $request['pw'];
        $admin->name = $request['name'];
        
        if ($admin->save()) {
            Log::info('新增成功', ['acc' => $admin->acc]);
            return redirect()->back()->with('success', '新增成功');
        } else {
            Log::error('新增失敗', ['acc' => $admin->acc]);
            return redirect()->back()->with('error', '新增失敗');
        }
    }

    public function update(Request $request)
    {
        $ids = $request->input('id', []);
        $isAdmin = $request->has('admin');
        $updateSuccess = false;
        $deleteSuccess = false;
    
        foreach ($ids as $key => $id) {
            $model = $isAdmin ? Admin::find($id) : User::find($id);
    
            if ($model && in_array($id, $request->input('del', []))) {
                $model->delete();
                $deleteSuccess = true;
            } elseif ($model) {
                $updateResult = $model->update([
                    'acc' => $request->input("acc.$key", ''),
                    'pw' => $request->input("pw.$key", ''),
                    'name' => $request->input("name.$key", ''),
                    'address' => $isAdmin ? null : $request->input("address.$key", ''),
                    'email' => $isAdmin ? null : $request->input("email.$key", ''),
                ]);
                if ($updateResult) {
                    $updateSuccess = true;
                }
            }
        }
    
        if ($deleteSuccess&&$updateSuccess) {
            Log::info('更新／刪除成功');
            return redirect()->back()->with('success', '更新／刪除成功');
        } elseif ($deleteSuccess) {
            Log::info('刪除成功');
            return redirect()->back()->with('success', '刪除成功');
        } elseif ($updateSuccess) {
            Log::info('更新成功');
            return redirect()->back()->with('success', '更新成功');
        } else {
            Log::error('操作失敗');
            return redirect()->back()->with('error', '操作失敗');
        }
    
        return redirect($isAdmin ? '/back/admins?do=admins' : '/back/users?do=users');
    }
}
