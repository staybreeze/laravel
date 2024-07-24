<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class UsersController extends Controller
{
    public function index()
    { 
        return view('register');
    }
    public function backIndex()
    {  
        $users = User::all(); 
        return view('back.users', ['users' => $users]);
    }

    public function create(Request $request)
    {
        Log::info('新增會員請求', ['data' => $request->all()]); 

        if (empty($request['acc']) || empty($request['pw'])) {
            Log::warning('帳號或密碼未提供', ['acc' => $request['acc'] ?? null]);
            return redirect()->back()->with('error', '必須提供帳號或密碼');
        }
        if (empty($request['email']) || User::where('email', $request['email'])->exists()) {
            Log::warning('電子郵件未提供或已存在', ['email' => $request['email'] ?? '']);
            return redirect()->back()->with('error', '電子郵件未提供或已存在');
        }
        $user = new User();
    
        $user->acc = $request['acc'];
        $user->pw = $request['pw'];
        $user->name = $request['name'] ?? '未命名';
        $user->address = $request['address'] ?? '未提供';
        $user->email = $request['email'] ;
    
        if ($user->save()) {
            Log::info('新增成功', ['acc' => $user->acc]);
            return redirect('/login')->with('register_success', '成功註冊會員，請登入');
        } else {
            Log::error('新增失敗', ['acc' => $user->acc]);
            return redirect()->back()->with('error', '註冊失敗');
        }
    }
    public function userUpdate(Request $request)
    {
        $id = $request->input('id'); // 直接獲取單一 id
        $updateSuccess = false;
        $deleteSuccess = false;
    
        $model =  User::find($id);
    
        if ($model && $request->has('del')) {
            $model->delete();
            $deleteSuccess = true;
        } elseif ($model) {
            $updateResult = $model->update([
                'acc' => $request->input('acc', ''),
                'pw' => $request->input('pw', ''),
                'name' => $request->input('name', ''),
                'address' =>  $request->input('address', ''),
                'email' => $request->input('email', ''),
            ]);
            if ($updateResult) {
                $updateSuccess = true;
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
    
        return redirect('/member');
    }
    public function usersUpdate(Request $request)
    {
        $ids = $request->input('id');
        if (!is_array($ids)) {
            $ids = [$ids];
        }
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

    public function checkAccount(Request $request)
    {
        $acc = $request->input('acc');
    
        $userExists = User::where('acc', $acc)->exists();
    
        if ($userExists) {
            return response()->json('1'); 
        }else{
          return response()->json('0');   
        }
    }
    public function delete(Request $request, $id)
    {
        $deleteSuccess = $this->performDeleteUser($id);
    
        if ($deleteSuccess) {
            Log::info('刪除成功');
            $request->session()->forget('user');
            return redirect('/')->with('success', '刪除成功');
        } else {
            Log::error('用戶未找到');
            return redirect()->back()->with('error', '用戶未找到');
        }
    }
    
    private function performDeleteUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return true;
        } else {
            return false;
        }
    }
}
